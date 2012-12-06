<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->myCoursesLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->myCoursesBreadcrumbs()) ?>
<?php end_slot() ?>

<?php include_partial('common/flashes') ?>

<div id="sf_admin_content">
    <div class="content-block">
        <h2>My Courses</h2>
        <div class="full-block" id="courses_list">
            <?php include_partial('student/courses', array('courses' => $courses)) ?>
        </div>
    </div>
</div>