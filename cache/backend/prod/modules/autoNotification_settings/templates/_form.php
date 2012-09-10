<div class="sf_admin_form">
    <div id="<?php echo $this->getModuleName() ?>_form_holder">
        <?php echo form_tag_for($form, '@notification_settings', array('id' => 'notification_settings_form')) ?>

        <?php echo $form->renderHiddenFields(false) ?>

        <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
        <?php include_partial('notification_settings/form_fieldset', array('notification_settings' => $notification_settings, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
        <?php endforeach; ?>

        <?php include_partial('notification_settings/form_actions', array('notification_settings' => $notification_settings, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
    </div>
</form>
</div>
