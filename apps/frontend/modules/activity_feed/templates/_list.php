<?php if (count($activityFeeds) == 0): ?>
    <div class="no-result">There's no activities logged yet.</div>
<?php endif; ?>
<?php foreach ($activityFeeds as $activityFeed): ?>
    <div class="activity-feed-row">
        <?php include_partial('personal_info/photo', array('profile' => $activityFeed->getDoer(), "dimension" => 48)) ?>
        <?php echo $activityFeed->getContent() ?>
    </div> 
<?php endforeach; ?>