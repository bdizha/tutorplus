<?php use_helper('I18N', 'Date') ?>
<div class="announcement">
    <?php include_partial('personal_info/photo', array('user' => $announcement->getUser(), "dimension" => 96)) ?>
    <div class="subject"><?php echo $announcement->getSubject() ?></div>
    <div class="description"><?php echo $announcement->getMessage() ?></div>
    <div class="user_meta">By <?php echo link_to($announcement->getUser(), 'profile_show', $announcement->getUser()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($announcement->getUpdatedAt()) ?></span></div>
    <?php if ($announcement->getUserId() == $sf_user->getId()): ?>
        <div class="inline-content-actions">
            <?php echo $helper->linkToAnnouncementEdit($announcement, array()) ?>
            <?php echo $helper->linkToAnnouncementDelete($announcement, array("confirm" => "Are you sure?")) ?>
        </div>
    <?php endif; ?>
</div>