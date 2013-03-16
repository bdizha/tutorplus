<?php if (!$newsItems->count()): ?>
<?php echo __("There isn't any news items yet.", array(), 'sf_admin') ?>
<?php else: ?>  
  <?php foreach ($newsItems as $i => $newsItem): ?>
    <?php include_partial('tpNewsItem/news_item', array('newsItem' => $newsItem, "helper" => $helper)) ?>
  <?php endforeach; ?>
<?php endif; ?>