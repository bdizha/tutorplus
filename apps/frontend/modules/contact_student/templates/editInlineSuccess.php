<?php use_helper('I18N', 'Date') ?>
<div id="sf_admin_form_container"> 
    <?php include_partial('student_contact/flashes', array('form' => $form)) ?>
    <?php include_partial('student_contact/form_inline', array('student_contact' => $student_contact, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper, 'current_fieldset' => $fieldset)) ?>
    <div id="sf_admin_footer">
        <input id="student_id" type="hidden" value="<?php echo $sf_user->getMyAttribute('student_show_id', null) ?>" name="student[id]">
        <?php include_partial('student_contact/form_footer', array('student_contact' => $student_contact, 'form' => $form, 'configuration' => $configuration)) ?>
    </div>   
</div>