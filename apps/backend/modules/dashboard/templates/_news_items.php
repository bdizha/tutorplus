<?php if (count($newsItems) == 0): ?>
    <div class="no-result">There's no news items.</div>
<?php endif; ?>
<?php foreach ($newsItems as $newsItem): ?>
    <div class="even-row">
        <?php include_partial('personal_info/photo', array('user' => $newsItem->getUser(), "dimension" => 36)) ?>
        <?php echo link_to($newsItem->getHeading(), 'discussion_show', $newsItem) ?>
    </div> 
<?php endforeach; ?>