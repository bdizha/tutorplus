<div class="sf_admin_form">
    <div id="<?php echo $this->getModuleName() ?>_form_holder">
        <?php echo form_tag_for($form, '@instructor_contact', array('id' => 'instructor_contact_form')) ?>
        <?php include_partial('instructor_contact/form_actions', array('instructor_contact' => $instructor_contact, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
        <?php echo $form->renderHiddenFields(false) ?>
        <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
            <?php include_partial('instructor_contact/form_fieldset', array('instructor_contact' => $instructor_contact, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
        <?php endforeach; ?>
        <?php include_partial('instructor_contact/form_actions', array('instructor_contact' => $instructor_contact, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
    </div>
</form>
</div>