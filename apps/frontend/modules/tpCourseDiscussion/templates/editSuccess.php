<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getEditLinks($course)) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->getEditBreadcrumbs($course)) ?>
<div class="sf_admin_heading">
    <h3>
        <?php include_partial('tpCourse/photo', array('course' => $course, "dimension" => 24)) ?>
        <?php echo __('%%code%% ~ %%name%%', array('%%code%%' => $course->getCode(), '%%name%%' => $course->getName()), 'messages') ?>
    </h3>
</div>
<?php include_partial('tpCommon/flashes_normal', array('form' => $form)) ?>
<div id="sf_admin_form_container">
    <div id="sf_admin_content">
        <div class="content-block">
            <?php include_partial('tpCommon/tabs', $helper->getTabs($courseDiscussions, "edit", $discussion)) ?>
            <div class="tab-block">
                <?php include_partial('tpCourseDiscussion/form', array('discussion' => $discussion, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
                <div id="sf_admin_footer">
                    <?php include_partial('tpCourseDiscussion/form_footer', array('discussion' => $discussion, 'form' => $form, 'configuration' => $configuration)) ?>
                </div>
            </div>
        </div>
    </div>
</div>