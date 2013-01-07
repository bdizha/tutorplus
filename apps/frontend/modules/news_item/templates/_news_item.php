<?php use_helper('I18N', 'Date') ?>
<div class="news-item">
  <?php include_partial('personal_info/photo', array('profile' => $newsItem->getProfile(), "dimension" => 96)) ?>
  <div class="meta-info">
    <div class="name"><?php echo link_to($newsItem->getProfile(), 'profile_show', $newsItem->getProfile()) ?></div> on
    <div class="datetime"><?php echo $newsItem->getUpdatedAt() ?></div> published:
  </div>
  <div class="heading">
    <?php echo $newsItem->getHeading() ?>    
  </div>
  <div class="body">
    <?php echo $newsItem->getBody() ?>
  </div>
  <?php if ($newsItem->getProfileId() == $sf_user->getId()): ?>
    <div class="inline-content-actions">
      <?php echo $helper->linkToNewsItemEdit($newsItem, array()) ?>
      <?php echo $helper->linkToNewsItemDelete($newsItem, array("confirm" => "Are you sure?")) ?>
    </div>
  <?php endif; ?>
</div>