<?php if (count($activityFeeds) == 0): ?>
    <div class="no-result">There's no notifications currently.</div>
<?php endif; ?>
<?php foreach ($activityFeeds as $activityFeed): ?>
    <div class="even-row">
        <?php include_partial('personal_info/photo', array('user' => $activityFeed->getDoer(), "dimension" => 36)) ?>
        <?php echo $activityFeed->getContent() ?>
        <div class="clear"></div>
    </div> 
<?php endforeach; ?>