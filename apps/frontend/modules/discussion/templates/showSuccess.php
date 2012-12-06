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
        <div class="discussion-left-block">
            <?php echo $discussion->getDescription() ?>
            <ul class="sf_admin_actions" style="clear:both">
                <li class="sf_admin_action_my_discussions">
                    <?php if ($discussion->getCourseDiscussion()->getCourseId()): ?>
                    <input type="button" class="button" onclick="document.location.href='/course/discussion';"
                           value="&lt; Course Discussions"/>
                    <?php else: ?>
                    <input type="button" class="button" onclick="document.location.href='/discussion';"
                           value="&lt; Discussions"/>
                    <?php endif; ?>
                </li>
                <li class="sf_admin_action_member_new">
                    <input type="button" class="button" href="/discussion/member/new" value="+ Invite Participants"/>
                </li>
                <li class="sf_admin_action_member">
                    <input type="button" class="button" onclick="document.location.href='/discussion/member';"
                           value="Manage Participants"/>
                </li>
                <?php $member = $discussion->getMemberByUserId($sf_user->getId()); ?>
                <?php if ($member): ?>
                <li class="sf_admin_action_edit_member">
                    <input type="button" class="button" href="/discussion/member/<?php echo $member->getId() ?>/edit" value="Edit Membership">
                </li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="discussion-right-block">
            <h2>Suggested Followers</h2>
            <div id="discussion-participants">
                <?php include_partial('personal_info/photo', array('user' => $discussion->getUser(), "dimension" => 36)) ?>
            </div>
        </div>
    </div>
    <div class="content-block">
        <div class="discussion-left-block">
            <h2>Discussion Topics - <?php echo $discussion->getTopics()->count(); ?> topic(s)</h2>
            <?php include_partial('discussion_topic/list', array('discussionTopics' => $discussion->getTopics(), 'helper' => $helper)) ?>
            <ul class="sf_admin_actions" style="clear:both">
                <li class="sf_admin_action_new">
                    <input type="button" class="button" value="+ New Topic"/>
                </li>
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
                <?php else: ?>
                <div class="no-result">There's no participants.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function () {
        $(".sf_admin_action_new input").click(function () {
            openPopup("/discussion/topic/new", "605px", "605px", "New Discussion Topic");
            return false;
        });

        $(".discussion_topic .button-edit").click(function () {
            openPopup($(this).attr("href"), "605px", "605px", "Edit Discussion Topic");
            return false;
        });
    });

    function fetchDiscussionTopics() {
        window.location = window.location.href;
    }
    //]]
</script>