<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', array("current_parent" => "home")) ?>
<?php end_slot() ?>

<div class="landing-row">
    <div id="authenticate">
        <?php echo get_partial('sfGuardAuth/form', array('form' => $form)) ?>
    </div>    
</div>