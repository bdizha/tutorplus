<?php use_helper('I18N', 'Date') ?>
<?php $discussionGroup = Doctrine_Core::getTable('DiscussionGroup')->findOneById($activityFeed->getItemId()) ?>
<?php if ($discussionGroup): ?>
    <?php include_partial('discussion_group/group', array('discussionGroup' => $discussionGroup, "showActions" => false)) ?>
<?php endif; ?>