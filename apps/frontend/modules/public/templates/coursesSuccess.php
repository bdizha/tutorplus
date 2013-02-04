<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', array("hideMenu" => true)) ?>
<?php include_component('common', 'publicMenu', array("currentParent" => "courses")) ?>
<div id="tp_admin_container">
    <div id="tp_admin_heading">
        <h1>Explore Courses</h1>
    </div>
    <div id="tp_admin_content">
        <div class="section-block">
            <div id="courses_list">
                <?php include_partial('common/flashes_normal') ?>
                <?php include_partial('course/list', array('courses' => $courses)) ?>
            </div>
        </div>
    </div>
</div>