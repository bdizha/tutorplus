<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->getShowLinks($course)) ?>
<?php include_partial('common/breadcrumbs', $helper->getShowBreadcrumbs($course)) ?>
<div class="sf_admin_heading">
	<h3>
		<?php include_partial('course/photo', array('course' => $course, "dimension" => 24)) ?>
		<?php echo __('%%code%% ~ %%name%%', array('%%code%%' => $course->getCode(), '%%name%%' => $course->getName()), 'messages') ?>
	</h3>
</div>
<?php include_partial('common/flashes_normal') ?>
<div id="sf_admin_content">
	<div class="content-block">
		<?php include_partial('common/tabs', array('tabs' => $helper->getShowTabs($course, "videos"))) ?>
		<div class="tab-block">
			<div class="no-result">There isn't any course videos to view yet.</div>
		</div>
		<?php include_partial('common/actions', $helper->getShowActions()) ?>
	</div>
</div>