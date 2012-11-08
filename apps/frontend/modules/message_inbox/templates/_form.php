<div class="sf_admin_form">
    <?php echo form_tag_for($form, '@message_inbox', array('id' => 'message_form')) ?>
    <?php echo $form->renderHiddenFields(false) ?>
    <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
        <?php include_partial('message_inbox/form_fieldset', array('email_message' => $email_message, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
    <?php endforeach; ?>
    <?php include_partial('message_inbox/form_actions', array('email_message' => $email_message, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
</form>
</div>