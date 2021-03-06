<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getLinks("course_videos")) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->getBreadcrumbs("Course Videos", "course/videos")) ?>
<div class="sf_admin_heading">
    <h3>
        <?php include_partial('tpCourse/photo', array('course' => $course, "dimension" => 24)) ?>
        <?php echo __('%%code%% ~ %%name%%', array('%%code%%' => $course->getCode(), '%%name%%' => $course->getName()), 'messages') ?>
    </h3>
</div>
<?php include_partial('tpCommon/flashes_normal') ?>
<div id="sf_admin_content">
    <div class="content-block">
        <?php include_partial('tpCommon/tabs', array('tabs' => $helper->getVidoeTabs())) ?>
        <div class="tab-block">
            There isn't any course videos to view yet.
        </div>
        <?php include_partial('tpCommon/actions', $helper->getShowActions()) ?>
    </div>
</div>