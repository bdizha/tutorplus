<?php use_helper('I18N', 'Date') ?>
<?php $discussion = Doctrine_Core::getTable('Discussion')->find($activityFeed->getItemId()) ?>
<?php if ($discussion): ?>
  <div class="snapshot discussion">
    <div class="heading">
      <?php include_partial('personal_info/photo', array('profile' => $discussion->getProfile(), "dimension" => 36)) ?>
      <div class="name">
        <?php echo link_to($discussion->getName(), 'discussion_show', $discussion) ?>
      </div>
    </div>
    <div class="body">
      <?php echo $discussion->getDescription() ?>
      <div class="user-meta">By <?php echo link_to($discussion->getProfile(), 'profile_show', $discussion->getProfile()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($discussion->getUpdatedAt()) ?></span></div>
    </div>
    <div class="statistics">
      <span class="list-count"><?php echo $discussion->getTopics()->count() ?></span> topics 
      <span class="list-count"><?php echo $discussion->getPostCount() ?></span> posts 
      <span class="list-count"><?php echo $discussion->getCommentCount() ?></span> comments
      <span class="list-count"><?php echo $discussion->getViewCount() ?></span> views
      <span class="list-count"><?php echo $discussion->getPeers()->count() ?></span> peers
    </div>
  </div>
<?php endif; ?>