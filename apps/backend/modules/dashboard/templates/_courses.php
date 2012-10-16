<?php if (count($myCourses) == 0): ?>
    <div class="no-result">There's no registered courses currently.</div>
<?php endif; ?>
<?php foreach ($myCourses as $myCourse): ?>
    <div class="even-row">
        <?php echo $myCourse->getCode() ?> - <?php echo link_to($myCourse->getName(), 'course_show', $myCourse) ?>
    </div> 
<?php endforeach; ?>