<?php if (count($discussionGroups) == 0): ?>
  <div class="no-result">You've not joined any DiscussionGroups yet</div>
<?php endif; ?>
<?php foreach ($discussionGroups as $discussionGroup): ?>
  <div class="timeline-row">
    <div class="heading">
      <?php include_partial('personal_info/photo', array('profile' => $discussionGroup->getProfile(), "dimension" => 24)) ?>
      <?php echo link_to($discussionGroup->getName(), 'discussion_group_show', $discussionGroup) ?>
    </div>
    <div class="body">
      <div class="user-meta">
        Started by <?php echo link_to($discussionGroup->getProfile(), 'profile_show', $discussionGroup->getProfile()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($discussionGroup->getUpdatedAt()) ?></span>
      </div>
    </div>
  </div> 
<?php endforeach; ?>