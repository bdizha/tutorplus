<?php if (count($myCourses) == 0): ?>
    <div class="no-result">You've not been enrolled to any course yet.</div>
<?php endif; ?>
<?php foreach ($myCourses as $myCourse): ?>
    <div class="even-row">
        <?php echo link_to($myCourse->getCode(), 'course_show', $myCourse) ?> - <?php echo $myCourse->getName() ?>
    </div> 
<?php endforeach; ?>