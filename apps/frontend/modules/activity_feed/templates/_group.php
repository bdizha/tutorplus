<?php use_helper('I18N', 'Date') ?>
<?php $discussionGroup = Doctrine_Core::getTable('DiscussionGroup')->find($activityFeed->getItemId()) ?>
<?php if ($discussionGroup): ?>
  <div class="snapshot discussion_group">
    <div class="heading">
      <?php include_partial('personal_info/photo', array('profile' => $discussionGroup->getProfile(), "dimension" => 36)) ?>
      <div class="name">
        <?php echo link_to($discussionGroup->getName(), 'discussion_group_show', $discussionGroup) ?>
      </div>
    </div>
    <div class="body">
      <?php echo $discussionGroup->getDescription() ?>
      <div class="user-meta">By <?php echo link_to($discussionGroup->getProfile(), 'profile_show', $discussionGroup->getProfile()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($discussionGroup->getCreatedAt()) ?></span></div>
    </div>
    <div class="statistics">
      <span class="list-count"><?php echo $discussionGroup->getTopics()->count() ?></span> topics 
      <span class="list-count"><?php echo $discussionGroup->getPostCount() ?></span> posts 
      <span class="list-count"><?php echo $discussionGroup->getCommentCount() ?></span> comments
      <span class="list-count"><?php echo $discussionGroup->getViewCount() ?></span> views
      <span class="list-count"><?php echo $discussionGroup->getPeers()->count() ?></span> peers
    </div>
  </div>
<?php endif; ?>