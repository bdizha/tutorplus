<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->showLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->showBreadcrumbs($discussion)) ?>
<div id="discussion-notice" class="notice">&nbsp;</div>
<div class="sf_admin_heading">
    <h3>Discussion ~ <?php echo $discussion->getName() ?></h3>
</div>
<div id="sf_admin_content">
    <div class="content-block">
        <div class="top-actions">
            <?php echo $helper->linkToInvitePeers() ?>
        </div>
        <div id="discussion">
            <div class="snapshot">
                <?php include_partial('personal_info/photo', array('profile' => $discussion->getProfile(), "dimension" => 36)) ?>
                <div class="body">
                    <?php echo $discussion->getDescription() ?>
                    <div class="user-meta">Started by <?php echo link_to($discussion->getProfile(), 'profile_show', $discussion->getProfile()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($discussion->getUpdatedAt()) ?></span></div>
                </div>
                <div class="statistics">
                    <span class="list-count"><?php echo $discussion->getTopics()->count() ?></span> topics 
                    <span class="list-count"><?php echo $discussion->getPostCount() ?></span> posts 
                    <span class="list-count"><?php echo $discussion->getCommentCount() ?></span> comments
                    <span class="list-count"><?php echo $discussion->getViewCount() ?></span> views
                    <span class="list-count"><?php echo $discussion->getPeers()->count() ?></span> peers
                </div>
            </div>
        </div>
        <ul class="sf_admin_actions" style="clear:both">
            <li class="sf_admin_action_my_timeline">
                <?php if ($discussion->getCourseDiscussion()->getCourseId()): ?>
                    <?php echo $helper->linkToCourseDiscussion() ?>
                <?php else: ?>
                    <?php echo $helper->linkToDiscussions() ?>
                <?php endif; ?>
            </li>
            <li class="sf_admin_action_member">
                <?php echo $helper->linkToManagePeers($discussion) ?>
            </li>
            <?php $discussionPeer = $discussion->getPeerByProfileId($sf_user->getId()); ?>
            <?php if ($discussionPeer): ?>
                <li class="sf_admin_action_edit_member">
                    <?php echo $helper->linkToEditMembership($discussionPeer->getId()) ?>
                </li>
                <li class="sf_admin_action_new_topic">
                    <?php echo $helper->linkToNewTopic() ?>
                </li>
            <?php else: ?>
                <li class="sf_admin_action_join_discussion">
                    <?php echo $helper->linkToJoinDiscussion() ?>
                </li>
            <?php endif; ?>
        </ul>
    </div>
    <div class="content-block">
        <h3>Discussion ~ Topic(s)</h3>
        <div id="discussion_topics">
            <?php include_partial('discussion_topic/list', array('discussionTopics' => $discussion->getTopics(), 'helper' => $helper)) ?>
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
            openPopup("/discussion/topic/new", '<?php echo $helper->getPopupWidth() ?>', '<?php echo $helper->getPopupHeight() ?>', "New Discussion Topic");
            return false;
        });

        $(".discussion-topic .button-edit").click(function () {
            openPopup($(this).attr("href"), '<?php echo $helper->getPopupWidth() ?>', '<?php echo $helper->getPopupHeight() ?>', "Edit Discussion Topic");
            return false;
        });
        
        $("#invite_follower ").click(function(){
            openPopup($(this).attr("href"), '556px', '556px', '+ Invite Discussion Peers');
            return false;
        });
        
        $(".peer-actions .invite").click(function(){
            var ProfileId = $(this).attr("ProfileId");
            $.get('/discussion/peer/accept/' + ProfileId, {}, function (response) {
                $("#discussion-notice").html(response);
                $(".notice").hide();
                $("#discussion-notice").show();
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