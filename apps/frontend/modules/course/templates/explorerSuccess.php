<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->courseExplorerLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->exploreCoursesBreadcrumbs()) ?>
<?php end_slot() ?>

<?php include_partial('common/flashes') ?>

<div id="sf_admin_content">
    <div class="content-block">
        <h2>Course Explorer</h2>
        <div class="full-block" id="courses_list">
            <?php include_partial('student/courses', array('courses' => $courses, 'student' => $student)) ?>
        </div>
    </div>
</div>