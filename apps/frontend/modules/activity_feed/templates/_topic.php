<?php use_helper('I18N', 'Date') ?>
<?php $discussionTopic = Doctrine_Core::getTable('DiscussionTopic')->find($activityFeed->getItemId()) ?>
<?php if ($discussionTopic): ?>
  <div class="snapshot">
    <div class="heading">
      <?php include_partial('personal_info/photo', array('profile' => $discussionTopic->getProfile(), "dimension" => 48)) ?>
      <div class="name"><?php echo link_to($discussionTopic->getProfile(), 'profile_show', $discussionTopic->getProfile()) ?> on</div>
      <div class="datetime"><?php echo $discussionTopic->getUpdatedAt() ?></div> created topic:
    </div>
    <div class="body">
      <?php echo link_to($discussionTopic->getSubject(), 'discussion_topic_show', $discussionTopic) ?>
      <?php echo $discussionTopic->getMessage() ?>
    </div>
    <div class="statistics">
      <span class="list-count">125</span> posts <span class="list-count">999+</span> comments <span class="list-count">455</span> views
    </div>
  </div>
<?php endif; ?> 