<?php use_helper('I18N', 'Date') ?>
<?php $discussionPost = Doctrine_Core::getTable('DiscussionPost')->findOneById($activityFeed->getItemId()) ?>
<?php if ($discussionPost): ?>
    <?php include_partial('tpDiscussionPost/post', array('discussionPost' => $discussionPost, "discussionCommentForm" => $discussionCommentForm, "discussionPostForm" => new DiscussionPostForm($discussionPost), "showActions" => false)) ?>
<?php endif; ?>