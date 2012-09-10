<div class="sf_admin_form">
    <div id="<?php echo $this->getModuleName() ?>_form_holder">
        <?php echo form_tag_for($form, '@student', array('id' => 'student_form')) ?>
        <?php include_partial('student/form_actions', array('student' => $student, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
        <?php echo $form->renderHiddenFields(false) ?>
        <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
            <?php include_partial('student/form_fieldset', array('student' => $student, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
        <?php endforeach; ?>
        <?php include_partial('student/form_actions', array('student' => $student, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
    </div>
</form>
</div>