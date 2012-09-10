<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
    <?php echo $form->renderHiddenFields(false) ?>
    <div class="row<?php $form["username"]->hasError() and print ' errors' ?>">
        <div class="other-label">
            <label for="signin_username" id="lbl_email">Email or Username:</label>
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
        <div class="other-label" id="sign-in-input">
            <label for="signin_remember" id="lbl_remember">Stay logged in:</label>
        </div>
        <div class="input-elm" id="sign-in-label">
            <?php echo $form["remember"] ?>				
        </div>
    </div>
    <div class="row">
        <div class="actions">       
            <div class="other-label">&nbsp;</div>
            <div id="sign-in">
                <input type="submit" class="button" value="Log&nbsp;In" />
            </div>
            <div id="request-password">
                <?php $routes = $sf_context->getRouting()->getRoutes() ?>
                <?php if (isset($routes['sf_guard_forgot_password'])): ?>
                    <a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Forgot your password?', null, 'sf_guard') ?></a>
                <?php endif; ?>
            </div>          
        </div>
    </div>
</form>