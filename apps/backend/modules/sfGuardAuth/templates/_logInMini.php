<?php use_helper('I18N') ?>
<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
    <?php echo $form->renderHiddenFields(false) ?>                
    <div class="row">
        <div class="frm-label">
            <label for="signin_username" id="lbl_email">Username:</label>
        </div>
        <div class="input-elm">								
            <?php echo $form["username"] ?>		
        </div>
    </div>
    <div class="row">
        <div class="frm-label">
            <label for="signin_password" id="lbl_password">Password:</label>
        </div>
        <div class="input-elm">								
            <?php echo $form["password"] ?>				
        </div>
    </div>
    <div class="row">
        <div class="input-elm" id="sign-in-label">
            <?php echo $form["remember"] ?>				
        </div>
        <div class="frm-label" id="sign-in-input">
            <label for="signin_remember" id="lbl_remember">Stay signed in:</label>
        </div>
    </div>
    <div class="row">
        <div class="actions">       
            <div id="sign-in">
                <input type="submit" id="login-in-btn" class="button" value="Log&nbsp;In">
            </div>          
        </div>
    </div>
    <div class="row" id="login-options">
        <a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Forgot your password?', null, 'sf_guard') ?></a>
    </div>
</form>