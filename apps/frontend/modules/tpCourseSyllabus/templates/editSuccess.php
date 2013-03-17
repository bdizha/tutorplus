<?php use_helper('I18N', 'Date') ?>
<?php $course = $course_syllabus->getCourse(); ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getLinks($course)) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->getBreadcrumbs("Syllabus", "course/syllabus/" . $course_syllabus->getId() . "/edit")) ?>
<div class="sf_admin_heading">
    <h3>
        <?php include_partial('tpCourse/photo', array('course' => $course, "dimension" => 24)) ?>
        <?php echo __('%%code%% ~ %%name%%', array('%%code%%' => $course->getCode(), '%%name%%' => $course->getName()), 'messages') ?>
    </h3>
</div>
<?php include_partial('tpCommon/flashes_normal') ?>
<div id="sf_admin_content">
    <div class="content-block">
        <?php include_partial('tpCommon/tabs', $helper->getTabs("edit", $course_syllabus)) ?>
        <div class="tab-block">
            <?php include_partial('tpCourseSyllabus/form', array('course_syllabus' => $course_syllabus, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
        </div>	
        <div id="sf_admin_footer">
            <?php include_partial('tpCourseSyllabus/form_footer', array('course_syllabus' => $course_syllabus, 'form' => $form, 'configuration' => $configuration)) ?>
        </div>
    </div>
</div>