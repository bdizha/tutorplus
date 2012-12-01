<div class="sf_admin_form">
    <div id="<?php echo $this->getModuleName() ?>_form_holder">
        <?php echo form_tag_for($form, '@student_enroll', array('id' => 'student_enroll_form')) ?>

        <?php echo $form->renderHiddenFields(false) ?>

        <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
        <?php include_partial('student_enroll/form_fieldset', array('student' => $student, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
        <?php endforeach; ?>
        
        <?php include_partial('student_enroll/courses_form_fieldset', array('form' => $form)) ?>

        <?php include_partial('student_enroll/form_actions', array('student' => $student, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
    </div>
</form>
</div>
