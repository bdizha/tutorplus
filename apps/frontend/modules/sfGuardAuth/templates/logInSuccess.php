<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'publicMenu', array()) ?>
<?php end_slot() ?>

<div id="tp_admin_container">
  <div id="tp_admin_heading">
    <h1>Sign In:</h1>
  </div>
  <div id="tp_admin_content">
    <div class="left-block">
      <fieldset>
        <form action="<?php echo url_for('@profile_sign_in') ?>" method="post">
          <?php include_partial('flashes', array('form' => $form)) ?>
          <?php echo $form->renderHiddenFields(false) ?>
          <div class="row<?php $form["username"]->hasError() and print ' errors' ?>">
            <div class="other-label">
              <label for="signin_username" id="lbl_email">Email or username:</label>
            </div>
            <div class="input-elm">								
              <?php echo $form["username"] ?>					
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
          <div class="row">
            <div class="input-elm" id="sign-in-input">
              <?php echo $form["remember"] ?>				
            </div>
            <div class="other-label" id="sign-in-label">
              <label for="signin_remember" id="lbl_remember">Stay signed in:</label>
            </div>
          </div>
          <div class="row">
            <div id="sign-in">
              <a href="<?php echo url_for('@profile_forgot_password') ?>">Forgot your password?</a>
              <input type="submit" loadingid="sign_in" class="button" value="Sign In" />
            </div>
          </div>
        </form>
      </fieldset>      
    </div>
    <div class="right-block">
      <h3>Here's what we offer you:</h3>
      <p>Learn relevant life matters from us.</p>
      <p>Freely and openly engage with other people's opinions.</p>
      <h3>Be a lifelong learner!</h3>
      <p>Ready to inspire others? Help us change our mutual living forever.</p>
      <div class="enroll-block">
        <div class="enroll-student">
          <input class="button" value="Enroll as a Student!" type="button" onclick="document.location.href = '/user/sign/in';">
        </div>
        <div class="enroll-insructor">
          <input class="button" value="Enroll as an Instructor!" type="button" onclick="document.location.href = '/user/sign/in';">
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
        $(".button").click(function(){
          $(this).val("Signing in...");
        });
</script>