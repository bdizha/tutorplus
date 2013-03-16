<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', array("hideMenu" => true)) ?>
<?php include_component('tpCommon', 'publicMenu', array("hideMenu" => true)) ?>
<div id="tp_admin_container">
	<div id="tp_admin_heading">
		<h1>Forgot your password?</h1>
	</div>
	<div id="tp_admin_content">
		<div class="left-block">
			<p>Please provide the email that you used when
				you signed up for your TutorPlus account.</p>
			<p>We will then send you an email that will allow you to reset your
				password.</p>
		</div>
		<div class="right-block">
			<div id="profile_sign_in_form_holder">
				<form action="<?php echo url_for('@profile_request_password') ?>"
					method="post">
					<fieldset>
						<?php include_partial('tpCommon/flashes_normal', array('form' => $form)) ?>
						<?php echo $form->renderHiddenFields(false) ?>
						<div class="row">
							<div class="other-label">
								<label for="login_email" id="lbl_email">Email:</label>
							</div>
							<div class="input-elm">
								<?php echo $form["email"] ?>
							</div>
						</div>
						<div style="clear: both;"></div>
						<div class="row">
							<div id="request-password">
								<a href="<?php echo url_for('@profile_sign_in') ?>">< Back to
									Sign In</a> <input type="submit" class="save"
									value="Send Verification Email">
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
  $("#request-password .button").click(function(){
    $(this).val("Requesting ...");
  });
</script>
