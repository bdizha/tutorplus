<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->getNewLinks($form)) ?>
<?php include_partial('common/breadcrumbs', $helper->newBreadcrumbs($form)) ?>
<div class="sf_admin_heading">
	<h3>
		<?php echo __('Announcements', array(), 'messages') ?>
	</h3>
</div>
<?php include_partial('common/flashes_normal', array('form' => $form)) ?>
<div id="sf_admin_content">
	<div class="content-block">
		<?php include_partial('common/tabs', array('tabs' => $helper->getTabs($announcements, $newsItems, "new"))) ?>
		<div class="tab-block">
			<?php include_partial('announcement/form', array('announcement' => $announcement, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
			<div id="sf_admin_footer">
				<?php include_partial('announcement/form_footer', array('announcement' => $announcement, 'form' => $form, 'configuration' => $configuration)) ?>
			</div>
		</div>
	</div>
</div>
