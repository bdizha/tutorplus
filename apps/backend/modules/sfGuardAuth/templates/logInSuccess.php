<?php use_helper('I18N') ?>
<div id="other_container_inner">
    <div id="authenticate">
        <h1>Log in:</h1>
        <?php include_partial('sfGuardAuth/flashes', array('form' => $form)) ?>
        <?php echo get_partial('sfGuardAuth/form', array('form' => $form)) ?>
    </div>    
</div>