<?php if (count($newsItems) == 0): ?>
    <div class="no-result">There's no news items.</div>
<?php endif; ?>
<?php foreach ($newsItems as $newsItem): ?>
    <div class="even-row">
        <?php include_partial('personal_info/photo', array('profile' => $newsItem->getProfile(), "dimension" => 36)) ?>
        <?php echo link_to($newsItem->getHeading(), 'news_item_show', $newsItem) ?>
    </div> 
<?php endforeach; ?>