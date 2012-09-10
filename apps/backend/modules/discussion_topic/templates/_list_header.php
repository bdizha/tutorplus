<?php use_helper('I18N', 'Date') ?>
<div class="discussion">
    <p class="discussion_desc"><?php echo $discussion->getDescription() ?></p>
    <div class="user_meta">By <?php echo link_to($discussion->getUser(), "profile") ?>  - <span class="datetime"><?php echo false !== strtotime($discussion->getUpdatedAt()) ? distance_of_time_in_words(strtotime($discussion->getUpdatedAt())) . " ago" : '&nbsp;' ?></span></div>
</div>
<ul class="sf_admin_actions" style="clear:both">
    <li class="sf_admin_action_my_discussions">
        <?php if ($discussion->getCourseDiscussion()->getCourseId()): ?>
            <input type="button" class="button" onclick="document.location.href='/backend.php/course_discussion';" value="&lt; Course Discussions" />
        <?php else: ?>
            <input type="button" class="button" onclick="document.location.href='/backend.php/discussion';" value="&lt; Discussions" />
        <?php endif; ?>                
    </li>
    <li class="sf_admin_action_member_new">
        <input type="button" class="button" href="/backend.php/discussion_member/new" value="+ Invite Participants" />
    </li>
    <li class="sf_admin_action_member">
        <input type="button" class="button" onclick="document.location.href='/backend.php/discussion_member';" value="Manage Participants" />
    </li>    
    <?php $member = $discussion->getMemberByUserId($sf_user->getId()); ?>
    <?php if ($member): ?>
        <li class="sf_admin_action_edit_member">
            <input type="button" class="button" href="/backend.php/discussion_member/<?php echo $member->getId() ?>/edit" value="Edit Membership">
        </li>
    <?php endif; ?>
</ul>