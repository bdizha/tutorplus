<?php if (count($newsItems) == 0): ?>
  <div class="no-result">There's not any news items yet.</div>
<?php endif; ?>
<?php foreach ($newsItems as $newsItem): ?>
  <div class="timeline-row">
    <div class="heading">
      <?php include_partial('personal_info/photo', array('profile' => $newsItem->getProfile(), "dimension" => 24)) ?>
      <?php echo link_to($newsItem->getHeading(), 'news_item') ?>
    </div>
    <div class="body">
      <div class="user-meta">
        By <?php echo link_to($newsItem->getProfile(), 'profile_show', $newsItem->getProfile()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($newsItem->getUpdatedAt()) ?></span>
      </div>
    </div>
  </div> 
<?php endforeach; ?>