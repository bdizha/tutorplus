<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', array("hideMenu" => true)) ?>
<?php include_component('common', 'publicMenu', array("hideMenu" => true)) ?>
<div id="tp_admin_container">
	<div id="tp_admin_heading">
		<h1>Choose your new password.</h1>
	</div>
	<div id="tp_admin_content">
		<div class="left-block">
			<p>Please enter your new password in the form right.</p>
		</div>
		<div class="right-block">
			<div id="profile_sign_in_form_holder">
				<form
					action="<?php echo url_for('@profile_reset_password_update?unique_key=' . $sf_request->getParameter('unique_key')) ?>"
					method="post">
					<fieldset>
						<?php include_partial('common/flashes_normal', array('form' => $form)) ?>
						<?php echo $form->renderHiddenFields(true) ?>
						<div class="row">
							<div class="other-label">
								<label for="sf_guard_user_password" id="lbl_email">Password:</label>
							</div>
							<div class="input-elm">
								<?php echo $form["password"] ?>
							</div>
						</div>
						<div class="row">
							<div class="other-label">
								<label for="sf_guard_user_password_again" id="lbl_email">Confirm
									password:</label>
							</div>
							<div class="input-elm">
								<?php echo $form["password_confirmation"] ?>
							</div>
						</div>
						<div style="clear: both;"></div>
						<div class="row">
							<div id="recover-password">
								<input type="submit" class="save" value="Change">
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
  $("#recover-password .button").click(function(){
    $(this).val("Saving ...");
  });
</script>
