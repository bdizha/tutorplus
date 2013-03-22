<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', array("hideMenu" => true)) ?>
<?php include_component('tpCommon', 'publicMenu', array("currentParent" => "courses")) ?>
<div id="tp_admin_container">
    <div id="tp_admin_content">
        <div class="section-block">
            <div id="courses_list">
                <?php include_partial('tpCommon/flashes_normal') ?>
                <?php include_partial('tpCourse/courses', array('courses' => $courses, "isPublic" => true)) ?>
            </div>
        </div>
    </div>
</div>