<div class="sf_admin_form">
    <?php echo form_tag_for($form, '@message_draft', array("id" => "message_form_" . $form->getObject()->getId())) ?>    
    <?php echo $form->renderHiddenFields(false) ?>
    <input type="hidden" id="message_action" name="message[action]" value="saving"></input>
    <?php if ($form->hasGlobalErrors()): ?>
        <?php echo $form->renderGlobalErrors() ?>
    <?php endif; ?>
    <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
        <?php include_partial('message_draft/form_fieldset', array('email_message' => $email_message, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
    <?php endforeach; ?>
    <?php include_partial('message_draft/form_actions', array('email_message' => $email_message, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
</form>
</div>