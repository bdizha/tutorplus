<fieldset id="sf_fieldset_<?php echo preg_replace('/[^a-z0-9_]/', '_', strtolower($fieldset)) ?>">
    <?php if ('Postal Address' == $fieldset): ?>
        <h2><?php echo __($fieldset." "."[Same as physical address above]<input type=\"checkbox\" id=\"same_as_physical_address\" name=\"same_as_physical_address\"/>", array(), 'messages') ?></h2>
    <?php elseif ('NONE' != $fieldset): ?>
        <h2><?php echo __($fieldset, array(), 'messages') ?></h2>
    <?php endif; ?>

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
</fieldset>
<script type='text/javascript'>
    $(document).ready(function(){
        $("#same_as_physical_address").click(function(){
            if($("#same_as_physical_address").is(":checked")){
                $("#student_contact_postal_address_line_1").val( $("#student_contact_address_line_1").val());
                $("#student_contact_postal_address_line_2").val($("#student_contact_address_line_2").val());
                $("#student_contact_postal_postcode").val($("#student_contact_postcode").val());
                $("#student_contact_postal_city").val($("#student_contact_city").val());
                $("#student_contact_postal_country_id").val($("#student_contact_country_id").val());
                $("#student_contact_postal_state_province_id").val($("#student_contact_state_province_id").val());
            }
            else{
                $("#student_contact_postal_address_line_1").val("");
                $("#student_contact_postal_address_line_2").val("");
                $("#student_contact_postal_postcode").val("");
                $("#student_contact_postal_city").val("");
                $("#student_contact_postal_country_id").val("");
                $("#student_contact_postal_state_province_id").val("");
            }
        });
    });
</script>
