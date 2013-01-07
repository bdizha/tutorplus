<?php use_helper('I18N', 'Date') ?>
<div class="announcement">
    <?php include_partial('personal_info/photo', array('profile' => $announcement->getProfile(), "dimension" => 96)) ?>
    <div class="subject"><?php echo $announcement->getSubject() ?></div>
    <div class="description"><?php echo $announcement->getMessage() ?></div>
    <div class="user-meta">By <?php echo link_to($announcement->getProfile(), 'profile_show', $announcement->getProfile()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($announcement->getUpdatedAt()) ?></span></div>
    <?php if ($announcement->getProfileId() == $sf_user->getId()): ?>
        <div class="inline-content-actions">
            <?php echo $helper->linkToAnnouncementEdit($announcement, array()) ?>
            <?php echo $helper->linkToAnnouncementDelete($announcement, array("confirm" => "Are you sure?")) ?>
        </div>
    <?php endif; ?>
</div>