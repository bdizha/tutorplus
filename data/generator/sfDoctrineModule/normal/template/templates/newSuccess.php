[?php use_helper('I18N', 'Date') ?]

[?php slot('nav_vertical') ?]
[?php include_component('common', 'secureMenu', $helper->newLinks($form)) ?]
[?php end_slot() ?]

[?php slot('breadcrumbs') ?]
[?php include_partial('common/breadcrumbs', $helper->newBreadcrumbs($form)) ?]
[?php end_slot() ?]

<div class="sf_admin_heading">
    <h3>[?php echo <?php echo $this->getI18NString('new.title') ?> ?]</h3>
</div>

[?php include_partial('<?php echo $this->getModuleName() ?>/flashes', array('form' => $form)) ?]

<div id="sf_admin_form_container">
    <div id="sf_admin_content">
        [?php include_partial('<?php echo $this->getModuleName() ?>/form', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?]
    </div>
    <div id="sf_admin_footer">
        [?php include_partial('<?php echo $this->getModuleName() ?>/form_footer', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration)) ?]
    </div>
</div>
