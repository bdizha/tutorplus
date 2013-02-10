<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->getNewLinks($form)) ?>
<?php include_partial('common/breadcrumbs', $helper->newBreadcrumbs($form)) ?>
<div class="sf_admin_heading">
	<h3>
		<?php echo __('Groups', array(), 'messages') ?>
	</h3>
</div>
<?php include_partial('common/flashes_normal', array('form' => $form)) ?>
<div id="sf_admin_form_container">
	<div id="sf_admin_content">
		<div class="content-block">
			<?php include_partial('common/tabs', array('tabs' => $helper->getTabs($myDiscussions, $exploreDiscussions, "new"))) ?>
			<div class="tab-block">
				<?php include_partial('discussion_group/form', array('discussion_group' => $discussion_group, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
			</div>
		</div>
		<div id="sf_admin_footer">
			<?php include_partial('discussion_group/form_footer', array('discussion_group' => $discussion_group, 'form' => $form, 'configuration' => $configuration)) ?>
		</div>
	</div>
</div>
