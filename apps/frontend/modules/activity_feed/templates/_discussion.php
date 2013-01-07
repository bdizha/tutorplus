<?php use_helper('I18N', 'Date') ?>
<?php $discussion = Doctrine_Core::getTable('Discussion')->find($activityFeed->getItemId()) ?>
<?php if ($discussion): ?>
  <div class="snapshot">
    <div class="heading">
      <?php include_partial('personal_info/photo', array('profile' => $discussion->getProfile(), "dimension" => 48)) ?>
      <div class="name"><?php echo link_to($discussion->getProfile(), 'profile_show', $discussion->getProfile()) ?> on</div>
      <div class="datetime"><?php echo $discussion->getUpdatedAt() ?></div> created discussion:
    </div>
    <div class="body">
      <?php echo link_to($discussion->getName(), 'discussion_show', $discussion) ?>
      <?php echo $discussion->getDescription() ?>
    </div>
    <div class="statistics">
      <span class="list-count">56</span> topics <span class="list-count">125</span> posts <span class="list-count">999+</span> comments <span class="list-count">455</span> views
    </div>
  </div>
<?php endif; ?>