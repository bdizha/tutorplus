<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getLinks("course_explorer")) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->getBreadcrumbs("Course Explorer", "course/explorer")) ?>
<?php include_partial('tpCommon/flashes_normal') ?>
<div id="sf_admin_content">
    <div class="content-block">
        <?php include_partial('tpCommon/tabs', array('tabs' => $helper->getTabs($exploreCourses, $myCourses, "explorer"))) ?>
        <div class="tab-block">
            <?php include_partial('courses', array('courses' => $exploreCourses)) ?>
        </div>
    </div>
</div>