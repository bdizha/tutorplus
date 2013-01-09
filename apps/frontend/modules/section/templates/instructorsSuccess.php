<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'publicMenu', array("currentParent" => "instructors")) ?>
<?php end_slot() ?>

<div id="tp_admin_container">
    <div id="tp_admin_heading">
        <h1>Our Authors & Instructors</h1>
    </div>
    <div id="tp_admin_content">
        <div class="section-block">
            Below is a list of our world renowned authors and instructors from around the world:
        </div>  
    </div>
</div>