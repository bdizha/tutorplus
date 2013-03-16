<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getLinks("my_courses")) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->getBreadcrumbs("My Courses", "/my/courses")) ?>
<?php include_partial('tpCommon/flashes_normal') ?>
<div id="sf_admin_content">
    <div class="content-block">
        <?php include_partial('tpCommon/tabs', array('tabs' => $helper->getTabs($exploreCourses, $myCourses, "my"))) ?>
        <div class="tab-block">
            <?php include_partial('courses', array('courses' => $myCourses, 'profile' => $sf_user->getProfile())) ?>
        </div>
    </div>
</div>