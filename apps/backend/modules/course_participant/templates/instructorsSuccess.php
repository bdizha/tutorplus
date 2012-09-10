<?php $courseInstructors = $course->getCourseInstructors(); ?>
<?php if ($courseInstructors->count() > 0): ?>
    <?php foreach ($courseInstructors as $courseInstructor): ?>
        <div class="course-instructor" id="course-instructor-<?php echo $courseInstructor->getInstructor()->getId() ?>">
            <div class="participant-image">
                <img alt="<?php echo $courseInstructor->getInstructor()->getName() ?>" src="/uploads/users/6/avatar_36.png">
            </div>
            <div class="participant-meta"><?php echo $courseInstructor->getInstructor()->getName() ?></div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    Currently there are no instructor participants on this course
<?php endif; ?>