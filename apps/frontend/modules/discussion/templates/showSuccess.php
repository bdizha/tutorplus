<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->showLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->showBreadcrumbs($discussion)) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3>Discussion ~ <?php echo $discussion->getName() ?></h3>
</div>
<div id="sf_admin_content">
    <div class="content-block">
        <div class="top-actions">
            <?php echo $helper->linkToInviteFollowers() ?>
        </div>
        <div class="discussion-left-block">
            <div class="full-block">
                <h2>By <?php echo link_to($discussion->getUser(), 'profile_show', $discussion->getUser()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($discussion->getUpdatedAt()) ?></span> - <a href="/discussion/topic/<?php echo $discussion->getSlug() ?>"><?php echo $discussion->getNbTopics() ?> topics of <?php echo $discussion->getNbTopics() ?> followers</a></h2>
                <div class="even-row"><?php echo $discussion->getDescription() ?></div>                
            </div>
            <ul class="sf_admin_actions" style="clear:both">
                <li class="sf_admin_action_my_discussions">
                    <?php if ($discussion->getCourseDiscussion()->getCourseId()): ?>
                        <?php echo $helper->linkToCourseDiscussion() ?>
                    <?php else: ?>
                        <?php echo $helper->linkToDiscussions() ?>
                    <?php endif; ?>
                </li>
                <li class="sf_admin_action_member">
                    <?php echo $helper->linkToManageFollowers($discussion) ?>
                </li>
                <?php $member = $discussion->getMemberByUserId($sf_user->getId()); ?>
                <?php if ($member): ?>
                    <li class="sf_admin_action_edit_member">
                        <?php echo $helper->linkToEditMembership($member->getId()) ?>
                    </li>
                    <li>
                        <?php echo $helper->linkToNewTopic() ?>
                    </li>
                <?php else: ?>
                    <li class="sf_admin_action_join_discussion">
                        <?php echo $helper->linkToJoinDiscussion() ?>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="discussion-right-block">
            <h2>Discussion Followers</h2>
            <div id="discussion-participants">
                <?php $members = $discussion->retrieveMembers(); ?>
                <?php if ($members->count() > 0): ?>
                    <?php foreach ($members as $member): ?>
                        <div class="participant">
                            <?php include_partial('personal_info/photo', array('user' => $member->getUser(), "dimension" => 36)) ?>
                        </div>  
                    <?php endforeach; ?>
                    <div class="clear">&nbsp;</div>
                <?php else: ?>
                    <div class="no-result">There's no participants.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="content-block">
        <div class="discussion-left-block">
            <h2>Discussion Topics - <?php echo $discussion->getTopics()->count(); ?> topic(s)</h2>
            <?php include_partial('discussion_topic/list', array('discussionTopics' => $discussion->getTopics(), 'helper' => $helper)) ?>
            <ul class="sf_admin_actions" style="clear:both">
                <li class="sf_admin_action_new_topic">
                    <?php echo $helper->linkToNewTopic() ?>
                </li>
            </ul>
        </div>
        <div class="discussion-right-block">
            <h2>Suggested Followers</h2>
            <div id="discussion-participants">
                <?php include_partial('personal_info/photo', array('user' => $discussion->getUser(), "dimension" => 36)) ?>
                <div class="clear">&nbsp;</div>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function () {
        $(".sf_admin_action_new_topic input").click(function () {
            openPopup("/discussion/topic/new", "605px", "605px", "New Discussion Topic");
            return false;
        });

        $(".discussion_topic .button-edit").click(function () {
            openPopup($(this).attr("href"), "605px", "605px", "Edit Discussion Topic");
            return false;
        });
        
        $(".discussion_topic").hover(function(){
            $(this).children(".discussion-actions").show();
        },
        function(){
            $(this).children(".discussion-actions").hide();
        });
    });

    function fetchDiscussionTopics() {
        window.location = window.location.href;
    }
    //]]
</script>