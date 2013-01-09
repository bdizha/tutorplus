<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', array("currentParent" => "home")) ?>
<?php end_slot() ?>

<div class="sf_admin_form">
    <div id="authenticate">
        <fieldset>
            <h2>Recover Password:</h2>
            <form action="<?php echo url_for('@sf_guard_forgot_password') ?>" method="post">
                <?php include_partial('sfGuardForgotPassword/flashes', array('form' => $form)) ?>
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
                    <div id="sign-in-back">
                        <a href="<?php echo url_for('@sf_guard_signin') ?>">< Back to Sign In</a>
                    </div>
                    <div id="recover-password">
                        <input type="submit" class="save" value="Recover&nbsp;Password">      
                    </div>
                </div>
            </form>
        </fieldset>
    </div>
</div>