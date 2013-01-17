<?php use_helper('I18N', 'Date') ?>
<?php $discussionTopic = Doctrine_Core::getTable('DiscussionTopic')->find($activityFeed->getItemId()) ?>
<?php if ($discussionTopic): ?>
  <div class="snapshot">
    <div class="heading">
      <?php include_partial('personal_info/photo', array('profile' => $discussionTopic->getProfile(), "dimension" => 36)) ?>
      <?php echo link_to($discussionTopic->getSubject(), 'discussion_topic_show', $discussionTopic) ?>
    </div>
    <div class="body">
      <?php echo $discussionTopic->getMessage() ?>
      <div class="user-meta">Posted by <?php echo link_to($discussionTopic->getProfile(), 'profile_show', $discussionTopic->getProfile()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($discussionTopic->getUpdatedAt()) ?></span></div>
    </div>
    <div class="statistics">
      <span class="list-count"><?php echo $discussionTopic->getPosts()->count() ?></span> posts 
      <span class="list-count"><?php echo $discussionTopic->getCommentCount() ?></span> comments
      <span class="list-count"><?php echo $discussionTopic->getViewCount() ?></span> views
      <span class="list-count"><?php echo $discussionTopic->getDiscussion()->getPeers()->count() ?></span> peers
    </div>
  </div>
<?php endif; ?>