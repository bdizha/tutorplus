<div class="sf_admin_form">
    <div id="student_inline_form_holder">
        <?php echo form_tag_for($form, '@student_inline', array('id' => 'student_inline_form')) ?>
        <?php echo $form->renderHiddenFields(false) ?>
        <?php if ($form->hasGlobalErrors()): ?>
            <?php echo $form->renderGlobalErrors() ?>
        <?php endif; ?>
        <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
            <?php include_partial('student/form_inline_fieldset', array('student' => $student, 'form' => $form, 'fields' => $fields, 'fieldset' => "NONE")) ?>
        <?php endforeach; ?>
        <?php include_partial('student/form_inline_actions', array('student' => $student, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
        </form>
    </div>
</div>