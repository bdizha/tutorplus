<?php use_helper('I18N') ?>
<div class="landing-row">
    <div id="authenticate">
        <div id="sf_admin_heading">
            <h3>Recover password:</h3>
        </div>
        <?php include_partial('sfGuardForgotPassword/flashes', array('form' => $form)) ?>
        <div class="sf_admin_form" style="margin-top: 10px;">
            <fieldset>
                <h2>Enter your Email and we'll send you a link and a set of instructions to follow to change your password:</h2>
                <form action="<?php echo url_for('@sf_guard_forgot_password') ?>" method="post">
                    <?php echo $form->renderHiddenFields(false) ?>
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
                            <a href="<?php echo url_for('@sf_guard_signin') ?>">< Back to Sign In</a>
                        </div>
                        <div class="input-elm">
                            <input type="submit" class="save" value="Recover&nbsp;password">      
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>