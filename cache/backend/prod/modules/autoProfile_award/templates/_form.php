<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="sf_admin_form">
    <div id="<?php echo $this->getModuleName() ?>_form_holder">
        <?php echo form_tag_for($form, '@profile_award', array('id' => 'profile_award_form')) ?>
        <?php echo $form->renderHiddenFields(false) ?>

        <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
        <?php include_partial('profile_award/form_fieldset', array('profile_award' => $profile_award, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
        <?php endforeach; ?>

        <?php include_partial('profile_award/form_actions', array('profile_award' => $profile_award, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
        </form>
    </div>
</div>