<div class="sf_admin_form">
    <div id="<?php echo $this->getModuleName() ?>_form_holder">
        <?php echo form_tag_for($form, '@profile', array('id' => 'profile_form')) ?>

        <?php echo $form->renderHiddenFields(false) ?>

        <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
        <?php include_partial('profile/form_fieldset', array('sf_guard_user' => $sf_guard_user, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
        <?php endforeach; ?>

        <?php include_partial('profile/form_actions', array('sf_guard_user' => $sf_guard_user, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
    </div>
</form>
</div>
