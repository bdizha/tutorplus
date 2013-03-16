<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getNewLinks($form)) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->newBreadcrumbs($form)) ?>
<div class="sf_admin_heading">
	<h3>
		<?php echo __('%%code%% ~ %%name%%', array('%%code%%' => $course->getCode(), '%%name%%' => $course->getName()), 'messages') ?>
	</h3>
</div>
<?php include_partial('tpCommon/flashes_normal', array('form' => $form)) ?>
<div id="sf_admin_form_container">
	<div id="sf_admin_content">
		<div class="content-block">
			<?php include_partial('tpCommon/tabs', array('tabs' => $helper->getTabs($course, "new"))) ?>
			<div class="tab-block">
				<?php include_partial('course_announcement/form', array('announcement' => $announcement, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
				<div id="sf_admin_footer">
					<?php include_partial('course_announcement/form_footer', array('announcement' => $announcement, 'form' => $form, 'configuration' => $configuration)) ?>
				</div>
			</div>
		</div>
	</div>
</div>