<?php if (count($myCourses) == 0): ?>
    <div class="no-result">There's no registered courses currently.</div>
<?php endif; ?>
<?php foreach ($myCourses as $myCourse): ?>
    <div class="even-row">
        <a class="photo-link" href="/course/<?php echo $myCourse->getSlug() ?>">
            <img src="/images/course-icon-36.png" class="image" alt="<?php echo $myCourse->getCode() ?>" title="<?php echo $myCourse->getCode() ?>">
        </a>
        <?php echo link_to($myCourse->getCode(), 'course_show', $myCourse) ?> - <?php echo $myCourse->getName() ?>
    </div> 
<?php endforeach; ?>