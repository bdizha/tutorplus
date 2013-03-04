<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->getEditLinks($course)) ?>
<?php include_partial('common/breadcrumbs', $helper->getEditBreadcrumbs($course)) ?>
<div class="sf_admin_heading">
	<h3>
		<?php echo __('%%code%% ~ %%name%%', array('%%code%%' => $course->getCode(), '%%name%%' => $course->getName()), 'messages') ?>
	</h3>
</div>
<?php include_partial('common/flashes_normal', array('form' => $form)) ?>
<div id="sf_admin_form_container">
	<div id="sf_admin_content">
		<div class="content-block">
			<?php include_partial('common/tabs', array('tabs' => $helper->getTabs($course, $courseDiscussions, "edit", $discussion))) ?>
			<div class="tab-block">
				<?php include_partial('course_discussion/form', array('discussion' => $discussion, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
				<div id="sf_admin_footer">
					<?php include_partial('course_discussion/form_footer', array('discussion' => $discussion, 'form' => $form, 'configuration' => $configuration)) ?>
				</div>
			</div>
		</div>
	</div>
</div>
