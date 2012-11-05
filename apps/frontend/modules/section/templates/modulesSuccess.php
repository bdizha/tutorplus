<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', array("current_parent" => "modules")) ?>
<?php end_slot() ?>

<div id="tp_admin_container">
    <div id="tp_admin_heading">
        <h3>Unisa Modules</h3>
    </div>
    <div id="tp_admin_content">
        <div class="section-block">
            <h2>Our offered UNISA modules</h2>
            Here's our tutored UNISA modules.
        </div>  
    </div>
</div>