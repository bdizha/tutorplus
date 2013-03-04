<?php if (count($discussions) == 0): ?>
  <div class="no-result">You haven't joined any discussion groups yet</div>
<?php endif; ?>
<?php foreach ($discussions as $discussion): ?>
  <div class="timeline-row">
    <div class="heading">
      <?php include_partial('personal_info/photo', array('profile' => $discussion->getProfile(), "dimension" => 36)) ?>
      <?php echo link_to($discussion->getName(), 'discussion_show', $discussion) ?>
    </div>
    <div class="body">
      <div class="user-meta">
        Started by <?php echo link_to($discussion->getProfile(), 'profile_show', $discussion->getProfile()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($discussion->getUpdatedAt()) ?></span>
      </div>
    </div>
  </div> 
<?php endforeach; ?>