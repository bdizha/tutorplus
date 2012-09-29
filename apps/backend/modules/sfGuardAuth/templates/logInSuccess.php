<?php use_helper('I18N') ?>
<div class="landing-row">
    <div id="authenticate">
        <div id="sf_admin_heading">
            <h3>Sign in:</h3>
        </div>
        <?php include_partial('sfGuardAuth/flashes', array('form' => $form)) ?>
        <?php echo get_partial('sfGuardAuth/form', array('form' => $form)) ?>
    </div>    
</div>