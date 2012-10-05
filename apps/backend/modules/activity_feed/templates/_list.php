<?php foreach ($activityFeeds as $i => $activityFeed): ?>
    <div class="even-row">
        <?php include_partial('personal_info/photo', array('user' => $activityFeed["user"], "dimension" => 24)) ?>
        <?php echo $activityFeed['content'] ?>
    </div> 
<?php endforeach; ?>