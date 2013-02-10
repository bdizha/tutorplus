<?php use_helper('I18N', 'Date') ?>
<?php $discussionGroup = Doctrine_Core::getTable('DiscussionGroup')->findOneById($activityFeed->getItemId()) ?>
<?php if ($discussionGroup): ?>
    <div class="timeline-row">
        <div class="heading">
            <?php include_partial('personal_info/photo', array('profile' => $discussionGroup->getProfile(), "dimension" => 36)) ?>
            <?php echo link_to($discussionGroup->getProfile(), 'profile_show', $discussionGroup->getProfile()) ?> you've unsubscribed from a discussion group: 
            <?php echo link_to($discussionGroup->getName(), 'discussion_group_show', $discussionGroup) ?> -
            <span class="datetime"><?php echo myToolkit::dateInWords($discussionGroup->getCreatedAt()) ?></span>
        </div>
    </div>
<?php endif; ?>