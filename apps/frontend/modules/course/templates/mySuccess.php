<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->myCoursesLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->myCoursesBreadcrumbs()) ?>
<?php include_partial('common/breadcrumbs', $helper->exploreCoursesBreadcrumbs()) ?>
<div class="sf_admin_heading">
	<h3>Courses</h3>
</div>
<div id="sf_admin_content">
	<div class="content-block">
		<?php include_partial('common/flashes_normal') ?>
		<?php include_partial('common/tabs', array('tabs' => $helper->getTabs($exploreCourses, $myCourses, "my"))) ?>
		<div class="tab-block">
			<?php include_partial('list', array('courses' => $courses, 'profile' => $sf_user->getProfile())) ?>
		</div>
	</div>
</div>