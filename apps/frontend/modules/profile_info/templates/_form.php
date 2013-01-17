<div class="sf_admin_form">
  <div id="<?php echo $this->getModuleName() ?>_form_holder">
    <?php echo form_tag_for($form, '@profile_info', array("id" => "profile_info_form")) ?>
    <?php echo $form->renderHiddenFields(true) ?>
    <fieldset id="sf_fieldset_none">
      <?php foreach ($form->getWidgetSchema()->getFields() as $name => $field): ?>
        <?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?>
        <?php
        include_partial('profile_info/form_field', array(
            'name' => $name,
            'form' => $form,
            'field' => $field,
            'class' => 'sf_admin_form_row sf_admin sf_admin_form_field_' . $name,
        ))
        ?>
      <?php endforeach; ?>
      <?php include_partial('profile_info/form_actions', array('form' => $form)) ?>
    </fieldset>
    </form>
  </div>
</div>