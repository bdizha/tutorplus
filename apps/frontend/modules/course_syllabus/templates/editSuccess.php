<?php use_helper('I18N', 'Date') ?>
<?php $course = $course_syllabus->getCourse(); ?>
<?php include_component('common', 'secureMenu', $helper->getLinks($course)) ?>
<?php include_partial('common/breadcrumbs', $helper->getBreadcrumbs($course, $course_syllabus)) ?>
<div class="sf_admin_heading">
    <h3>
        <?php include_partial('course/photo', array('course' => $course, "dimension" => 24)) ?>
        <?php echo __('%%code%% ~ %%name%%', array('%%code%%' => $course->getCode(), '%%name%%' => $course->getName()), 'messages') ?>
    </h3>
</div>
<?php include_partial('common/flashes_normal') ?>
<div id="sf_admin_content">
    <div class="content-block">
        <?php include_partial('common/tabs', array('tabs' => $helper->getTabs($course, "edit", $course_syllabus))) ?>
        <div class="tab-block">
            <?php include_partial('course_syllabus/form', array('course_syllabus' => $course_syllabus, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
        </div>	
        <div id="sf_admin_footer">
            <?php include_partial('course_syllabus/form_footer', array('course_syllabus' => $course_syllabus, 'form' => $form, 'configuration' => $configuration)) ?>
        </div>
    </div>
</div>