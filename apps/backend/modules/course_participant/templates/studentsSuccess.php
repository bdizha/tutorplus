<?php $courseStudent = $course->getCourseStudents(); ?>
<?php if ($courseStudent->count() > 0): ?>
    <?php foreach ($courseStudent as $studentCourse): ?>
        <div class="course-student" id="course-student-<?php echo $studentCourse->getStudent()->getId() ?>">
            <div class="participant-image">
                <img alt="<?php echo $studentCourse->getStudent()->getName() ?>" src="/uploads/users/6/avatar_36.png" />
            </div>
            <div class="participant-meta"><?php echo $studentCourse->getStudent()->getName() ?></div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    Currently there are no student participants on this course
<?php endif; ?>