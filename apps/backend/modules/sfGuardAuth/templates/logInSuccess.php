<?php use_helper('I18N') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', array()) ?>
<?php end_slot() ?>

<div class="landing-row">
    <div id="authenticate">
        <div id="sf_admin_heading">
            <h3>Sign In:</h3>
        </div>
        <?php include_partial('sfGuardAuth/flashes', array('form' => $form)) ?>
        <?php echo get_partial('sfGuardAuth/form', array('form' => $form)) ?>
    </div>    
</div>