<?php use_helper('I18N') ?>
<?php use_helper('I18N') ?>
<div id="other_container_inner">
    <h1>Recover Password:</h1>
    <?php include_partial('sfGuardForgotPassword/flashes', array('form' => $form)) ?>
    <form action="<?php echo url_for('@sf_guard_forgot_password') ?>" method="post">
        <?php echo $form->renderHiddenFields(false) ?>
        <div class="row">
            <p>Enter your Email and we'll send you a link and a set of instructions to follow to change your password.</p>
        </div>
        <div class="row">
            <div class="other-label">
                <label for="login_email" id="lbl_email">Email:</label>
            </div>
            <div class="input-elm">								
                <?php echo $form["email_address"] ?>					
            </div>
        </div>
        <div style="clear: both;"></div>
        <div class="row">
            <div class="other-label">
                <a href="<?php echo url_for('@sf_guard_signin') ?>">< Back to Login</a>
            </div>
            <div class="input-elm">
                <input type="submit" class="save" value="Recover&nbsp;Password">      
            </div>
        </div>
    </form>
</div>