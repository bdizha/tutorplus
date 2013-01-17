[?php use_helper('I18N', 'Date') ?]
<div id="cboxLoadedContentInner">
  <div id="sf_admin_form_container">
    <div id="sf_admin_form_content">
      [?php include_partial('common/flashes', array('form' => $form)) ?]
      [?php include_partial('<?php echo $this->getModuleName() ?>/form', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?]
    </div>
    <div id="sf_admin_form_footer">
      [?php include_partial('<?php echo $this->getModuleName() ?>/form_footer', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration)) ?]
    </div>
  </div>
</div>