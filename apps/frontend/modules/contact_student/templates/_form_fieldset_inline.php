<fieldset id="sf_fieldset_<?php echo preg_replace('/[^a-z0-9_]/', '_', strtolower($fieldset)) ?>" style="display:<?php echo ($current_fieldset == preg_replace('/[^a-z0-9_]/', '_', strtolower($fieldset)) ? 'block' : 'none') ?>">
    <?php foreach ($fields as $name => $field): ?>
        <?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal()))
            continue ?>
        <?php
        include_partial('student_contact/form_field', array(
            'name' => $name,
            'attributes' => $field->getConfig('attributes', array()),
            'label' => $field->getConfig('label'),
            'help' => $field->getConfig('help'),
            'form' => $form,
            'field' => $field,
            'class' => 'sf_admin_form_row sf_admin_' . strtolower($field->getType()) . ' sf_admin_form_field_' . $name,
        ))
        ?>
    <?php endforeach; ?>
    <input type="hidden" value="<?php echo $current_fieldset ?>" name="fieldset"></input>
    <input type="hidden" value="inline" name="edit_type"></input>
</fieldset>