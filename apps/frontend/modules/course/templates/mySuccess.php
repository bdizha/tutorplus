<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->myCoursesLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->myCoursesBreadcrumbs()) ?>
<div class="sf_admin_heading">
  <h3>My Courses</h3>
</div>
<div id="sf_admin_content">
  <div class="content-block">
    <div id="courses_list">
      <?php include_partial('common/flashes_normal') ?>
      <?php include_partial('list', array('courses' => $courses, 'profile' => $sf_user->getProfile())) ?>
    </div>
  </div>
</div>