<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getLinks()) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->getBreadcrumbs()) ?>
<?php include_partial('tpCommon/flashes_normal') ?>
<div id="left-column">
    <div class="dashboard-photo">
        <?php include_partial('tpPersonalInfo/photo', array('profile' => $profile, "dimension" => 128)) ?>
    </div>
    <div class="row">
        <div class="message-inbox">
            <?php echo link_to('Message Inbox <span class="list-count-container"><span class="list-count">' . $totalInboxCount . '</span></span>', 'message_inbox') ?>
        </div>
    </div>
    <div class="row">
        <div class="underlined">
            <h5>
                Peer Suggestions <span class="list-count-container"><span
                        class="list-count" id="peers-suggestion-count"><?php echo $suggestedPeers->count() ?>
                    </span> </span>
            </h5>
        </div>
        <?php if ($suggestedPeers->count() > 0): ?>
            <div class="dashboard-peers">
                <?php include_partial('suggestions', array("peers" => $suggestedPeers, "profile" => $profile)) ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="underlined">
            <h5>
                Peer Requests <span class="list-count-container"><span
                        class="list-count"><?php echo $requestedPeers->count() ?> </span> </span>
            </h5>
        </div>
        <?php if ($requestedPeers->count() > 0): ?>
            <div class="dashboard-peers">
                <?php include_partial('requests', array("peers" => $requestedPeers, "profile" => $profile)) ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="underlined">
            <h5>
                My Peers <span class="list-count-container"><span class="list-count"><?php echo $peers->count() ?>
                    </span> </span>
            </h5>
        </div>
        <?php if ($peers->count() > 0): ?>
            <div class="dashboard-peers">
                <?php include_partial('peers', array("peers" => $peers, "profile" => $profile)) ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<div id="middle-column">
    <div id="sf_admin_content">
        <h2>
            Welcome,
            <?php echo $profile->getTitle() . " " . $profile->getName() ?>!
        </h2>
        <div class="column-two">
            <div class="row"></div>
            <div class="row">
                <h4>Activity Feeds</h4>
                <div id="dashboard-feeds">
                    <?php foreach ($activityFeeds as $activityFeed): ?>
                        <?php include_partial('tpActivityFeed/activity_feed', array("activityFeed" => $activityFeed)) ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="row">
                <h4>My Courses</h4>
                <div id="dashboard-courses">
                    <?php include_partial('courses', array("courses" => $courses, "profile" => $profile)) ?>
                </div>
            </div>
            <div class="row">
                <h4>My Discussions</h4>
                <div id="dashboad_news_items">
                    <?php include_partial('discussions', array("discussions" => $discussions)) ?>
                </div>
            </div>
        </div>
        <div class="column-three">
            <div class="row">
                <h4>News Updates</h4>
                <div id="dashboad_news_items">
                    <?php include_partial('news_items', array("newsItems" => $newsItems)) ?>
                </div>
            </div>
            <div class="row">
                <h4>Announcements</h4>
                <div id="dashboard_announcements">
                    <?php include_partial('announcements', array("announcements" => $announcements)) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
    //<![DATA[
    $(function() {        
        $('.dashboard-peers').scrollbars();
    });
    
    $(document).ready(function(){    	
        $(".peer-open").live("click",function(){
            var peerId = $(this).attr("peerid");
            var inviterId = $(this).attr("inviterid");
            var inviteeId = $(this).attr("inviteeid");
            $(this).removeClass("peer-open");
            $(this).addClass("peer-invited");

            $(this).parent().removeClass("button-box-open");
            $(this).parent().addClass("button-box-invited");

            $(this).attr("value","Invited");
            $.get('/peer/invite/' + inviterId + '/' + inviteeId,{},function(response){
                if (response.status == "success") {
                    $(".ajax-notice").html(response.notice);
                    $(".ajax-notice").show();
                    var peerSuggestionCount = $("#peers-suggestion-count").html();
                    $("#peers-suggestion-count").html(parseInt($.trim(peerSuggestionCount)) - 1);
                    setTimeout(function(){
                        $("#peer-" + peerId).slideUp("slow");
                    }, 2000);
                }
            },'json');
        });
        
        $(".peer-accept").live("click",function(){
            var peerId = $(this).attr("peerid");
            var inviterId = $(this).attr("inviterid");
            $(this).addClass("peer-peered");
            $(this).removeClass("peer-accept");

            $(this).parent().removeClass("button-box-accept");
            $(this).parent().addClass("button-box-peered");
            $(this).attr("value","Peers");
            $.get('/peer/accept/' + inviterId,{},function(response){
                if (response.status == "success") {
                    $(".ajax-notice").html(response.notice);
                    $(".ajax-notice").show();
                    var peerSuggestionCount = $("#peers-suggestion-count").html();
                    $("#peers-suggestion-count").html(parseInt($.trim(peerSuggestionCount)) + 1);
                    setTimeout(function(){
                        $("#peer-" + peerId).slideUp("slow");
                    }, 2000);
                }
            },'json');
        });      
        
        $(".peer-decline").live("click",function(){
            var peerId = $(this).attr("peerid");
            var inviterId = $(this).attr("inviterid");
            var inviteeId = $(this).attr("inviteeid");
            $(this).removeClass("peer-open");
            $(this).addClass("peer-invited");

            $(this).parent().removeClass("button-box-open");
            $(this).parent().addClass("button-box-invited");
            
            $(this).attr("value","Invited");
            $.get('/peer/decline/' + inviterId + '/' + inviteeId,{},function(response){
                if (response.status == "success") {
                    $(".ajax-notice").html(response.notice);
                    $(".ajax-notice").show();
                    var peerSuggestionCount = $("#peers-suggestion-count").html();
                    $("#peers-suggestion-count").html(parseInt($.trim(peerSuggestionCount)) - 1);
                    setTimeout(function(){
                        $("#peer-" + peerId).slideUp("slow");
                    }, 2000);
                }
            },'json');
        });
    });
    //]]
</script>
