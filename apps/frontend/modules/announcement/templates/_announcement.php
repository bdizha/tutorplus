<?php use_helper('I18N', 'Date') ?>
<div class="announcement">
  <div class="heading">
    <?php include_partial('personal_info/photo', array('profile' => $announcement->getProfile(), "dimension" => 36)) ?>
    <?php echo $announcement->getSubject() ?>
  </div>
  <div class="body">
    <?php echo $announcement->getMessage() ?>
    <div class="user-meta">Posted by <?php echo link_to($announcement->getProfile(), 'profile_show', $announcement->getProfile()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($announcement->getUpdatedAt()) ?></span></div>
  </div>
  <?php if ($announcement->getProfileId() == $sf_user->getId()): ?>
    <div class="inline-content-actions">
      <?php echo $helper->linkToAnnouncementEdit($announcement, array()) ?>
      <?php echo $helper->linkToAnnouncementDelete($announcement, array("confirm" => "Are you sure?")) ?>
    </div>
  <?php endif; ?>
</div>