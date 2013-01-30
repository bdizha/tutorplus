<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', array("hideMenu" => true)) ?>
<?php include_component('common', 'publicMenu', array()) ?>
<div id="tp_admin_container">
  <div id="tp_admin_heading">
    <h1>Sign In:</h1>
  </div>
  <div id="tp_admin_content">
    <div class="left-block">
      <div id="profile_sign_in_form_holder">
        <form action="<?php echo url_for('@profile_sign_in') ?>" method="post">
          <fieldset>
            <?php include_partial('common/flashes_normal', array('form' => $form)) ?>
            <?php echo $form->renderHiddenFields(false) ?>
            <div class="row<?php $form["email"]->hasError() and print ' errors' ?>">
              <div class="other-label">
                <label for="signin_email" id="lbl_email">Email:</label>
              </div>
              <div class="input-elm">								
                <?php echo $form["email"] ?>					
              </div>
            </div>
            <div class="row<?php $form["password"]->hasError() and print ' errors' ?>">
              <div class="other-label">
                <label for="signin_password" id="lbl_password">Password:</label>
              </div>
              <div class="input-elm">								
                <?php echo $form["password"] ?>				
              </div>
            </div>
            <div class="row sf_admin_boolean">    
              <label for="signin_remember" id="lbl_remember">Remember me:</label>
              <div class="content ">
                <?php echo $form["remember"] ?>    
              </div>
            </div>
            <div class="row">
              <div id="sign-in">
                <a href="<?php echo url_for('@profile_forgot_password') ?>">Forgot your password?</a>
                <input type="submit" loadingid="sign_in" class="button" value="Sign In" />
              </div>
            </div>
          </fieldset> 
        </form>     
      </div>  
    </div>
    <div class="right-block">
      <h3>Here's what we offer you:</h3>
      <p>Learn relevant life matters from us.</p>
      <p>Freely and openly engage with other people's opinions.</p>
      <h3>Be a lifelong learner!</h3>
      <p>Ready to inspire others? Help us change our mutual living forever.</p>
      <?php include_partial('common/enroll_block') ?>
    </div>
  </div>
</div>
<script type="text/javascript">
  $("#sign-in .button").click(function(){
    $(this).val("Signing in...");
  });
</script>