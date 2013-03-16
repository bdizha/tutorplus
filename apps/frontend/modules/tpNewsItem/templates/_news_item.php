<?php use_helper('I18N', 'Date') ?>
<div class="snapshot">
  <div class="heading">
    <?php include_partial('tpPersonalInfo/photo', array('profile' => $newsItem->getProfile(), "dimension" => 36)) ?>
    <?php echo $newsItem->getHeading() ?>
  </div>
  <div class="body">
    <?php echo $newsItem->getBlurb() ?>
    <div class="user-meta">Posted by <?php echo link_to($newsItem->getProfile(), 'profile_show', $newsItem->getProfile()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($newsItem->getUpdatedAt()) ?></span></div>
  </div>
  <?php if ($newsItem->getProfileId() == $sf_user->getId()): ?>
    <div class="inline-content-actions">
      <?php echo $helper->linkToEdit($newsItem, array()) ?>
      <?php echo $helper->linkToDelete($newsItem, array("confirm" => "Are you sure?")) ?>
    </div>
  <?php endif; ?>
</div>