<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getLinks($course)) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->getBreadcrumbs($course)) ?>
<div class="sf_admin_heading">
    <h3>
        <?php include_partial('course/photo', array('course' => $course, "dimension" => 24)) ?>
        <?php echo __('%%code%% ~ %%name%%', array('%%code%%' => $course->getCode(), '%%name%%' => $course->getName()), 'messages') ?>
    </h3>
</div>
<?php include_partial('tpCommon/flashes_normal') ?>
<div id="sf_admin_content">
    <div class="content-block">
        <?php include_partial('tpCommon/tabs', array('tabs' => $helper->getTabs($course, "show"))) ?>
        <div class="tab-block">
            <?php echo $courseSyllabus->getContent() ?>
        </div>
    </div>
</div>