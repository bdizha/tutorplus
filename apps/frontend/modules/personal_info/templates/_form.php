<div class="sf_admin_form">
    <div id="<?php echo $this->getModuleName() ?>_form_holder">
        <?php echo form_tag_for($form, '@personal_info', array("id" => "personal_info_form")) ?>
        <?php foreach ($form->getWidgetSchema()->getFields() as $name => $field): ?>
            <?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?>
            <?php
            include_partial('personal_info/form_field', array(
                'name' => $name,
                'form' => $form,
                'field' => $field,
                'class' => 'sf_admin_form_row sf_admin sf_admin_form_field_' . $name,
            ))
            ?>
        <?php endforeach; ?>
        <?php echo $form->renderHiddenFields(true) ?>
        <?php include_partial('personal_info/form_actions', array('form' => $form)) ?>
        </form>
    </div>
</div>