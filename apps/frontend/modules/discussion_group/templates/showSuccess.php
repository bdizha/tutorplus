<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->showLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->showBreadcrumbs($discussionGroup)) ?>
<div class="sf_admin_heading">
    <h3>Group ~ <?php echo $discussionGroup->getName() ?></h3>
</div>
<div id="sf_admin_content">
    <div class="content-block">
        <div id="discussion_group">
            <div class="snapshot">
                <?php include_partial('personal_info/photo', array('profile' => $discussionGroup->getProfile(), "dimension" => 36)) ?>
                <div class="body">
                    <?php echo $discussionGroup->getDescription() ?>
                    <div class="user-meta">Started by <?php echo link_to($discussionGroup->getProfile(), 'profile_show', $discussionGroup->getProfile()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($discussionGroup->getCreatedAt()) ?></span></div>
                </div>
                <div class="statistics">
                    <span class="list-count"><?php echo $discussionGroup->getTopics()->count() ?></span> topics 
                    <span class="list-count"><?php echo $discussionGroup->getPostCount() ?></span> posts 
                    <span class="list-count"><?php echo $discussionGroup->getCommentCount() ?></span> comments
                    <span class="list-count"><?php echo $discussionGroup->getViewCount() ?></span> views
                    <span class="list-count"><?php echo $discussionGroup->getPeers()->count() ?></span> peers
                </div>
            </div>
        </div>
        <?php include_partial('common/actions', array('actions' => $helper->showActions($discussionGroup))) ?>
    </div>
    <div class="content-block">
        <h3>Group Topic(s)</h3>
        <div id="discussion_topics">
            <?php include_partial('discussion_topic/list', array('discussionTopics' => $discussionGroup->getTopics(), 'helper' => $helper)) ?>
        </div>
        <ul class="sf_admin_actions" style="clear:both">
            <li class="sf_admin_action_new_topic">
                <?php echo $helper->linkToNewTopic() ?>
            </li>
        </ul>
    </div>
</div>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function () {
        $(".sf_admin_action_new_topic input").click(function () {
            openPopup("/discussion/topic/new", '<?php echo $helper->getPopupWidth() ?>', '<?php echo $helper->getPopupHeight() ?>', "New DiscussionGroup Topic");
            return false;
        });

        $(".discussion-topic .button-edit").click(function () {
            openPopup($(this).attr("href"), '<?php echo $helper->getPopupWidth() ?>', '<?php echo $helper->getPopupHeight() ?>', "Edit DiscussionGroup Topic");
            return false;
        });
        
        $("#invite_follower ").click(function(){
            openPopup($(this).attr("href"), '556px', '556px', '+ Invite DiscussionGroup Peers');
            return false;
        });
        
        $(".peer-actions .invite").click(function(){
            var ProfileId = $(this).attr("ProfileId");
            $.get('/discussion/peer/accept/' + ProfileId, {}, function (response) {
                $("#discussion-group-notice").html(response);
                $(".notice").hide();
                $("#discussion-group-notice").show();
                setTimeout(function(){
                    $(".notice").hide();
                },3000);
                $("#suggested-followers").load("/discussion/peer/suggested");
            }, 'html');
        });
        
        $(".discussion-topic").hover(function(){
            $(this).children(".inline-content-actions").show();
        },
        function(){
            $(this).children(".inline-content-actions").hide();
        });
    });

    function fetchDiscussionTopics() {
        window.location = window.location.href;
    }
    //]]
</script>