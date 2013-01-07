<?php use_helper('I18N', 'Date') ?>
<div class="announcement">
  <?php include_partial('personal_info/photo', array('profile' => $announcement->getProfile(), "dimension" => 96)) ?>
  <div class="meta-info">
    <div class="name"><?php echo link_to($announcement->getProfile(), 'profile_show', $announcement->getProfile()) ?></div> on
    <div class="datetime"><?php echo $announcement->getUpdatedAt() ?></div> announced:
  </div>
  <div class="heading">
    <?php echo $announcement->getSubject() ?>
  </div>
  <div class="body">
    <?php echo $announcement->getMessage() ?>
  </div>
  <?php if ($announcement->getProfileId() == $sf_user->getId()): ?>
    <div class="inline-content-actions">
      <?php echo $helper->linkToAnnouncementEdit($announcement, array()) ?>
      <?php echo $helper->linkToAnnouncementDelete($announcement, array("confirm" => "Are you sure?")) ?>
    </div>
  <?php endif; ?>
</div>