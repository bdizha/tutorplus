<?php use_helper('I18N', 'Date') ?>
<?php $discussionTopic = Doctrine_Core::getTable('DiscussionTopic')->findOneById($activityFeed->getItemId()) ?>
<?php if ($discussionTopic): ?>
    <?php include_partial('tpDiscussionTopic/topic', array('discussionTopic' => $discussionTopic, "showActions" => false)) ?>
<?php endif; ?>