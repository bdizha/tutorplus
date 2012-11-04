<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', array("current_parent" => "modules")) ?>
<?php end_slot() ?>

<div id="sf_admin_container">
    <div class="sf_admin_heading">
        <h3>Unisa Modules</h3>
    </div>
    <div id="sf_admin_content">
        <div class="content-block">
            <h2>Our offered UNISA modules</h2>
            <div class="full-block">
                <div class="even-row">
                   Here's our tutored UNISA modules.
                </div>
            </div>
        </div>
    </div>
</div>