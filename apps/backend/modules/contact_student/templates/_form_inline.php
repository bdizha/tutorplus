<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="sf_admin_form">
  <?php echo form_tag_for($form, '@student_contact_inline', array('id' => 'student_contact_form')) ?>
    <?php echo $form->renderHiddenFields(false) ?>

    <?php if ($form->hasGlobalErrors()): ?>
      <?php echo $form->renderGlobalErrors() ?>
    <?php endif; ?>

    <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
      <?php include_partial('student_contact/form_fieldset_inline', array('student_contact' => $student_contact, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset, 'current_fieldset' => $current_fieldset)) ?>
    <?php endforeach; ?>

    <?php include_partial('student_contact/form_inline_actions', array('student_contact' => $student_contact, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper, 'current_fieldset' => $current_fieldset)) ?>
  </form>
</div>
