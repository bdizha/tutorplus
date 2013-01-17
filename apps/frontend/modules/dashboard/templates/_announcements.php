<?php if (count($announcements) == 0): ?>
  <div class="no-result">There's not any announcements yet.</div>
<?php endif; ?>
<?php foreach ($announcements as $announcement): ?>
  <div class="timeline-row">
    <div class="heading">
      <?php include_partial('personal_info/photo', array('profile' => $announcement->getProfile(), "dimension" => 24)) ?>
      <?php echo link_to($announcement->getSubject(), 'announcement') ?>
    </div>
    <div class="body">
      <div class="user-meta">
        By <?php echo link_to($announcement->getProfile(), 'profile_show', $announcement->getProfile()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($announcement->getUpdatedAt()) ?></span>
      </div>
    </div>
  </div> 
<?php endforeach; ?>