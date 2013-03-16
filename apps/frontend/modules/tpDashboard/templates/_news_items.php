  <?php if (count($newsItems) == 0): ?>
    <div class="no-result">There isn't any news yet.</div>
<?php endif; ?>
<?php foreach ($newsItems as $newsItem): ?>
    <div class="timeline-row">
        <div class="heading">
            <?php include_partial('tpPersonalInfo/photo', array('profile' => $newsItem->getProfile(), "dimension" => 36)) ?>
            <?php echo link_to($newsItem->getProfile(), 'profile_show', $newsItem->getProfile()) ?> published: 
            <?php echo link_to($newsItem->getHeading(), 'news_item') ?> -
            <span class="datetime"><?php echo myToolkit::dateInWords($newsItem->getCreatedAt()) ?></span>
        </div>
    </div>
<?php endforeach; ?>