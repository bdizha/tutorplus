<?php if (!empty($isAuthenticated)): ?>
    <?php $profile = $sf_user->getProfile() ?>
<?php endif; ?>
<div class="course-catalog">
    <div class="course-photo">
        <?php include_partial('course/photo', array('course' => $course, "dimension" => 96)) ?>
        <div class="course-status">
            <?php echo $course->getIsFinalized() ? "Active" : "Inactive" ?>
        </div>
    </div>
    <div class="course-description">
        <div class="name">
            <?php echo link_to($course->getCode(), 'course_show', $course) ?>
            -
            <?php echo$course->getName() ?>
        </div>
        <div class="course-row">
            <div class="row-label">Institution:</div>
            <div class="row-value">University of Cape Town</div>
        </div>
        <div class="course-row">
            <div class="row-label">Duration:</div>
            <div class="row-value">
                <?php echo (int) ($course->getHours() / 24 / 7) ?>
                weeks long
            </div>
        </div>
        <div class="course-row">
            <div class="row-label">Max enrolled:</div>
            <div class="row-value">
                <?php echo $course->getMaxEnrolled() ?>
                students
            </div>
        </div>
    </div>
    <?php if (isset($isPublic) && $isPublic): ?>
        <div class="course-instructors">
            <?php $courseInstructorProfiles = ProfileTable::getInstance()->findByCourseId($course->getId(), true, 2); ?>
            <?php foreach ($courseInstructorProfiles as $profile): ?>
                <div class="peer">
                    <?php include_partial('tpPersonalInfo/photo', array('profile' => $profile, "dimension" => 36)) ?>
                    <div class="name">
                        <?php echo link_to($profile->getName(), 'profile_show', $profile) ?>
                    </div>
                    <div class="institution">Instructor</div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <div class="course-actions">
        <?php if (!empty($isAuthenticated) && $profile->isEnrolled($course->getId())): ?>
            <div class="button-box-enter">
                <input class="enter" title="Enter Course!"
                       href="/my/course/<?php echo $course->getSlug() ?>"
                       value="Enter Course!" type="button" />
            </div>
            <div class="button-box-unregister">
                <input class="unregister" title="Enter Course!" action="unregister"
                       href="/my/course/<?php echo $course->getSlug() ?>"
                       courseid="<?php echo $course->getId() ?>" value="Unregister Course!"
                       type="button" />
            </div>
        <?php else: ?>
            <div class="button-box-enroll">
                <input class="enroll" title="+ Enroll Now!" action="enroll"
                       href="/my/course/<?php echo $course->getSlug() ?>"
                       courseid="<?php echo $course->getId() ?>" value="+ Enroll Now!"
                       type="button" />
            </div>
        <?php endif; ?>
    </div>
</div>
