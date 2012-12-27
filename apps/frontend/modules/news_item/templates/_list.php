<?php if (!$pager->getNbResults()): ?>
    <div class="no-result">
        <?php echo __("There's no news items currently.", array(), 'sf_admin') ?>
    </div>
<?php else: ?>  
    <div id="news_items">
        <?php foreach ($pager->getResults() as $i => $newsItem): $odd = fmod(++$i, 2) ? 'odd' : 'even' ?>
            <?php include_partial('news_item/news_item', array('newsItem' => $newsItem, "helper" => $helper)) ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>