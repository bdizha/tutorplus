<?php use_helper('I18N', 'Date') ?>
<div id="cboxLoadedContentInner">
    <div id="sf_admin_form_container">
        <div id="sf_admin_form_content">
            <?php include_partial('student_contact/flashes', array('form' => $form)) ?>
            <?php include_partial('student_contact/form_inline', array('student_contact' => $student_contact, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper, 'current_fieldset' => $fieldset)) ?>
        </div>
    </div>
</div>