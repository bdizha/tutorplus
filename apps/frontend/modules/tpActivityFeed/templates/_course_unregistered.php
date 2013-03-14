<?php use_helper('I18N', 'Date') ?>
<?php $course = Doctrine_Core::getTable('Course')->findOneById($activityFeed->getItemId()) ?>
<?php if ($course): ?>
    <div class="timeline-row">
        <div class="heading">
            <?php include_partial('personal_info/photo', array('profile' => $activityFeed->getDoer(), "dimension" => 36)) ?>
            You've unregistered from course: <?php echo link_to($course->getName(), 'course_show', $course) ?> -
            <span class="datetime"><?php echo myToolkit::dateInWords($activityFeed->getCreatedAt()) ?></span>
        </div>
    </div>
<?php endif; ?>