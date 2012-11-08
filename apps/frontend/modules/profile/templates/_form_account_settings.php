<div id="sf_admin_form_content">
    <div id="profile_account_settings_form_holder">
    <div class="sf_admin_form">
        <?php echo form_tag_for($form, '@profile_account_settings', array('id' => 'profile_account_settings_form')) ?>
        <?php echo $form->renderHiddenFields(false) ?>
        <?php if ($form->hasGlobalErrors()): ?>
            <?php echo $form->renderGlobalErrors() ?>
        <?php endif; ?>
        <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
            <?php include_partial('profile/form_account_settings_fieldset', array('profile' => $profile, 'form' => $form, 'fields' => $fields, 'fieldset' => "NONE")) ?>
        <?php endforeach; ?>
        <?php include_partial('profile/form_account_settings_actions', array('profile' => $profile, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
        </form>
    </div>
</div>