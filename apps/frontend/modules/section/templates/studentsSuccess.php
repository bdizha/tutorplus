<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', array("current_parent" => "students")) ?>
<?php end_slot() ?>

<div id="tp_admin_container">
    <div id="tp_admin_heading">
        <h3>Our Students</h3>
    </div>
    <div id="tp_admin_content">
        <div class="section-block">
            <h2>Enrolled UNISA students</h2>
            Students from across South Africa!
        </div>
    </div>
</div>