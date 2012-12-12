<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', array("current_parent" => "home")) ?>
<?php end_slot() ?>

<div class="sf_admin_form">
    <div id="authenticate">
        <fieldset>
            <h2>Sign In:</h2>
            <form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
                <?php include_partial('sfGuardAuth/flashes', array('form' => $form)) ?>
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
                    <div id="request-password">
                        <?php $routes = $sf_context->getRouting()->getRoutes() ?>
                        <?php if (isset($routes['sf_guard_forgot_password'])): ?>
                            <a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Forgot your password?', null, 'sf_guard') ?></a>
                        <?php endif; ?>
                    </div>          
                    <div id="sign-in">
                        <input type="submit" loadingid="sign_in" class="button" value="Sign In" />
                    </div>
                </div>
            </form>
        </fieldset>
    </div>
</div>    
<script type="text/javascript">
    $(".button").click(function(){
        $(this).val("Loading...");
    });
</script>