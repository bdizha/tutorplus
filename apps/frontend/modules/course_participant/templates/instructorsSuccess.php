<?php $courseInstructors = $course->getCourseInstructors(); ?>
<?php if ($courseInstructors->count() > 0): ?>
    <div class="peer-block  padding-10">
        <?php foreach ($courseInstructors as $courseInstructor): ?>
            <?php $user = $courseInstructor->getInstructor()->getUser() ?>
            <div class="peer" id="course-student-<?php echo $courseInstructor->getInstructor()->getId() ?>">
                <?php include_partial('personal_info/photo', array('user' => $user, "dimension" => 36)) ?>
                <div class="name"><?php echo link_to(myToolkit::shortenString($user->getName(), 14), 'profile_show', $user) ?></div>
                <div class="type"><?php echo $user->getType() ?></h4>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="no-result">There's no instructor participants added to this course currently</div>
<?php endif; ?>