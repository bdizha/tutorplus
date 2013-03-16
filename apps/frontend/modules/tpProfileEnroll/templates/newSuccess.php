<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', array("hideMenu" => true)) ?>
<?php include_component('tpCommon', 'publicMenu', array("hideMenu" => true)) ?>
<div id="tp_admin_container">
	<div id="tp_admin_heading">
		<h1>
			<?php echo __('Sign Up', array(), 'messages') ?>
		</h1>
	</div>
	<div id="tp_admin_content">
		<div class="left-block">
			<?php include_partial('tpCommon/enroll_block') ?>
		</div>
		<div class="right-block">
			<?php include_partial('tpCommon/flashes_normal', array('form' => $form)) ?>
			<div id="sf_admin_form_container">
				<div id="sf_admin_content">
					<?php include_partial('profile_enroll/form', array('profile' => $profile, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
				</div>
				<div id="sf_admin_footer">
					<?php include_partial('profile_enroll/form_footer', array('profile' => $profile, 'form' => $form, 'configuration' => $configuration)) ?>
				</div>
			</div>
		</div>
	</div>
</div>