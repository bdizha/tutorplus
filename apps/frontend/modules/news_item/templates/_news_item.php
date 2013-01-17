<?php use_helper('I18N', 'Date') ?>
<div class="news-item">
  <div class="heading">
    <?php include_partial('personal_info/photo', array('profile' => $newsItem->getProfile(), "dimension" => 96)) ?>
    <?php echo $newsItem->getHeading() ?>
  </div>
  <div class="body">
    <?php echo $newsItem->getBody() ?>
    <div class="user-meta">Posted by <?php echo link_to($newsItem->getProfile(), 'profile_show', $newsItem->getProfile()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($newsItem->getUpdatedAt()) ?></span></div>
  </div>
  <?php if ($newsItem->getProfileId() == $sf_user->getId()): ?>
    <div class="inline-content-actions">
      <?php echo $helper->linkToNewsItemEdit($newsItem, array()) ?>
      <?php echo $helper->linkToNewsItemDelete($newsItem, array("confirm" => "Are you sure?")) ?>
    </div>
  <?php endif; ?>
</div>