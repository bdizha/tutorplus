[?php use_stylesheets_for_form($form) ?]
[?php use_javascripts_for_form($form) ?]

<div class="sf_admin_form">
    <div id="[?php echo $this->getModuleName() ?]_form_holder">
        [?php echo form_tag_for($form, '@<?php echo $this->params['route_prefix'] ?>', array('id' => '<?php echo $this->getModuleName() ?>_form')) ?]
        [?php echo $form->renderHiddenFields(false) ?]

        [?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?]
        [?php include_partial('<?php echo $this->getModuleName() ?>/form_fieldset', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?]
        [?php endforeach; ?]

        [?php include_partial('<?php echo $this->getModuleName() ?>/form_actions', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?]
        </form>
    </div>
</div>