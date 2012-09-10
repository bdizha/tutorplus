<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="sf_admin_form">
    <?php echo form_tag_for($form, '@calendar', array('id' => 'form')) ?>
    <?php echo $form->renderHiddenFields(false) ?>

    <?php if ($form->hasGlobalErrors()): ?>
        <?php echo $form->renderGlobalErrors() ?>
    <?php endif; ?>

    <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
        <?php include_partial('calendar/form_fieldset', array('calendar' => $calendar, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
    <?php endforeach; ?>
</form>
<div id="color_picker_holder" style="display: none;">
    <div id="color_picker">
        <div id="#3640AD" style="background-color: #3640AD; float: left; width:14px; height:14px; margin:3px;">&nbsp;</div>
        <div id="#1111CC" style="background-color: #1111CC; float: left; width:14px; height:14px; margin:3px;">&nbsp;</div>
        <div id="#228822" style="background-color: #228822; float: left; width:14px; height:14px; margin:3px;">&nbsp;</div>
        <div id="#551A8B" style="background-color: #551A8B; float: left; width:14px; height:14px; margin:3px;">&nbsp;</div>
        <div id="#FF0000" style="background-color: #FF0000; float: left; width:14px; height:14px; margin:3px;">&nbsp;</div>
        <div id="#FF6600" style="background-color: #FF6600; float: left; width:14px; height:14px; margin:3px;">&nbsp;</div>
        <div id="#CC0066" style="background-color: #CC0066; float: left; width:14px; height:14px; margin:3px;">&nbsp;</div>
        <div id="#BFBFBF" style="background-color: #BFBFBF; float: left; width:14px; height:14px; margin:3px;">&nbsp;</div>
        <div style="clear:both"/>
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#calendar_color").parent().append($("#color_picker_holder").html());
        $("#color_picker div").click(function(){
            $("#calendar_color").val($(this).attr("id"));
        });
    });
</script>