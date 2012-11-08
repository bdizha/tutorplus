<?php $i = 0 ?>
<?php foreach ($events as $event): ?>    
    <?php $i++ ?>
    <?php if ($i <= $limit): ?>
        <div class="event-row">
            <?php echo $event['title'] ?>
            <a href="<?php echo url_for('@calendar_event_show?id=' . $event['id']) ?>">View Event</a>
        </div>
    <?php endif; ?>
<?php endforeach; ?>
<div class="more-link"><?php echo link_to("More Calendar Events", '@my_calendar') ?></div>