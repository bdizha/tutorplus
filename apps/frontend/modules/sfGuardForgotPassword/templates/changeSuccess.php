<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'secureMenu', array("currentParent" => "home")) ?>
<?php end_slot() ?>

<div class="sf_admin_form">
    <div id="authenticate">
        <fieldset>
            <h2><?php echo __('Hello %name%', array('%name%' => $user->getName()), 'sf_guard') ?></h2>
            <form action="<?php echo url_for('@sf_guard_forgot_password_update?unique_key=' . $sf_request->getParameter('unique_key')) ?>" method="post">
                <?php include_partial('sfGuardForgotPassword/flashes', array('form' => $form)) ?>
                <?php echo $form->renderHiddenFields(false) ?>
                <div class="row">
                    <?php echo __('Enter your new password in the form below.', null, 'sf_guard') ?> 
                </div>
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
                        <label for="sf_guard_user_password_again" id="lbl_email">Confirm password:</label>
                    </div>
                    <div class="input-elm">								
                        <?php echo $form["password_again"] ?>					
                    </div>
                </div>
                <div style="clear: both;"></div>
                <div class="row">
                    <div id="recover-password">
                        <input type="submit" class="save" value="Change">      
                    </div>
                </div>
            </form>
        </fieldset>
    </div>
</div>