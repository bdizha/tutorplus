<?php $courseInstructors = $course->getCourseInstructors(); ?>
<?php if ($courseInstructors->count() > 0): ?>
    <div class="padding-10">
        <?php foreach ($courseInstructors as $courseInstructor): ?>
            <?php $user = $courseInstructor->getInstructor()->getProfile() ?>
            <div class="peer" id="course-student-<?php echo $courseInstructor->getInstructor()->getId() ?>">
                <?php include_partial('personal_info/photo', array('profile' => $user, "dimension" => 48)) ?>
                <div class="name"><?php echo link_to($user->getName(), 'profile_show', $user) ?></div>
                <div class="type"><?php echo $user->getType() ?></h4>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="course-row">There's no instructor followers added to this course currently</div>
<?php endif; ?>