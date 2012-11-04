<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', array("current_parent" => "students")) ?>
<?php end_slot() ?>

<div id="sf_admin_container">
    <div class="sf_admin_heading">
        <h3>Our Students</h3>
    </div>
    <div id="sf_admin_content">
        <div class="content-block">
            <h2>Enrolled UNISA students</h2>
            <div class="full-block">
                <div class="even-row">
                   Students from across South Africa!
                </div>
            </div>
        </div>
    </div>
</div>