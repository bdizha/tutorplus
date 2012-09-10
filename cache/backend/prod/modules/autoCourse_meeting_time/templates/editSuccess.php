<?php use_helper('I18N', 'Date') ?>
<div id="cboxLoadedContentInner">
    <div id="sf_admin_form_container">
        <div id="sf_admin_form_content">
            <?php include_partial('course_meeting_time/flashes', array('form' => $form)) ?>
            <?php include_partial('course_meeting_time/form', array('course_meeting_time' => $course_meeting_time, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
        </div>
    </div>
</div>