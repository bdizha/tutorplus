<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->courseExplorerLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->exploreCoursesBreadcrumbs()) ?>
<?php end_slot() ?>

<?php include_partial('common/flashes') ?>

<div class="sf_admin_heading">
  <h3>Course Explorer</h3>
</div>
<div id="sf_admin_content">
    <div class="content-block">
        <div id="courses_list">
            <?php include_partial('courses', array('courses' => $courses, 'profile' => $sf_user->getProfile())) ?>
        </div>
    </div>
</div>