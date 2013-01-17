[?php use_helper('I18N', 'Date') ?]
[?php include_component('common', 'secureMenu', $helper->editLinks($<?php echo $this->getSingularName() ?>)) ?]
[?php include_partial('common/breadcrumbs', $helper->editBreadcrumbs($<?php echo $this->getSingularName() ?>)) ?]
<div class="sf_admin_heading">
    <h3>[?php echo <?php echo $this->getI18NString('edit.title') ?> ?]</h3>
</div>
[?php include_partial('common/flashes', array('form' => $form)) ?]
<div id="sf_admin_form_container">	
    <div id="sf_admin_content">
        [?php include_partial('<?php echo $this->getModuleName() ?>/form', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?]
    </div>	
    <div id="sf_admin_footer">
        [?php include_partial('<?php echo $this->getModuleName() ?>/form_footer', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration)) ?]
    </div>
</div>