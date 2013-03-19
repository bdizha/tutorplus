<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', array("hideMenu" => true)) ?>
<?php include_component('tpCommon', 'publicMenu', array("hideMenu" => true)) ?>
<div id="tp_admin_container">
    <div id="tp_admin_heading">
        <h1>Sign In:</h1>
    </div>
    <div id="tp_admin_content">
        <div class="left-block">
            <?php include_partial('tpCommon/features') ?>
        </div>
        <div class="right-block">
            <div id="profile_sign_in_form_holder">
                <form action="<?php echo url_for('@profile_sign_in') ?>"
                      method="post">
                    <fieldset>
                        <?php include_partial('tpCommon/flashes_normal', array('form' => $form)) ?>
                        <?php echo $form->renderHiddenFields(false) ?>
                        <div class="row">
                            <div class="other-label">
                                <label for="signin_email" id="lbl_email">Email:</label>
                            </div>
                            <div class="input-elm">
                                <?php echo $form["email"] ?>
                            </div>
                        </div>
                        <div class="row">
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
                                <a href="<?php echo url_for('@profile_request_password') ?>">Forgot your password?</a> <input type="submit" id="sign_in" class="button" value="Sign In" />
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#sign-in .button").click(function(){
        $(this).val("Signing in...");
    });
</script>
