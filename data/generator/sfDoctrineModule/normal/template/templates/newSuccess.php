[?php use_helper('I18N', 'Date') ?]
[?php include_component('tpCommon', 'secureMenu', $helper->getNewLinks($form)) ?]
[?php include_partial('tpCommon/breadcrumbs', $helper->newBreadcrumbs($form)) ?]
<div class="sf_admin_heading">
  <h3>[?php echo <?php echo $this->getI18NString('new.title') ?> ?]</h3>
</div>
[?php include_partial('tpCommon/flashes_normal', array('form' => $form)) ?]
<div id="sf_admin_form_container">
  <div id="sf_admin_content">
    [?php include_partial('<?php echo $this->getModuleName() ?>/form', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?]
  </div>
  <div id="sf_admin_footer">
    [?php include_partial('<?php echo $this->getModuleName() ?>/form_footer', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration)) ?]
  </div>
</div>