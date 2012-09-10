<div class="sf_admin_form">
    <div id="<?php echo $this->getModuleName() ?>_form_holder">
        <?php echo form_tag_for($form, '@student_contact', array('id' => 'student_contact_form')) ?>
        <?php include_partial('student_contact/form_actions', array('student_contact' => $student_contact, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
        <?php echo $form->renderHiddenFields(false) ?>
        <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
            <?php include_partial('student_contact/form_fieldset', array('student_contact' => $student_contact, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
        <?php endforeach; ?>
        <?php include_partial('student_contact/form_actions', array('student_contact' => $student_contact, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
    </div>
</form>
</div>