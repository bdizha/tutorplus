[?php use_helper('I18N', 'Date') ?]
[?php include_component('tpCommon', 'secureMenu', $helper->getLinks()) ?]
[?php include_partial('tpCommon/breadcrumbs', $helper->getBreadcrumbs()) ?]
<div class="sf_admin_heading">
  <h3>[?php echo <?php echo $this->getI18NString('list.title') ?> ?]</h3>
</div>
[?php include_partial('tpCommon/flashes_normal') ?]
<?php if ($this->configuration->hasFilterForm()): ?>
  <!--
  <div id="sf_admin_bar">
    [?php include_partial('<?php echo $this->getModuleName() ?>/filters', array('form' => $filters, 'configuration' => $configuration)) ?]
  </div>
  -->
<?php endif; ?>
<div id="sf_admin_content">
  <?php if ($this->configuration->getValue('list.batch_actions')): ?>
    <form action="[?php echo url_for('<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'batch')) ?]" method="post">
    <?php endif; ?>
    [?php include_partial('<?php echo $this->getModuleName() ?>/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?]
    <ul class="sf_admin_actions">
      [?php include_partial('<?php echo $this->getModuleName() ?>/list_batch_actions', array('helper' => $helper)) ?]
      [?php include_partial('<?php echo $this->getModuleName() ?>/list_actions', array('helper' => $helper)) ?]
    </ul>
    <?php if ($this->configuration->getValue('list.batch_actions')): ?>
    </form>
  <?php endif; ?>
</div>
<div id="sf_admin_footer">
  [?php include_partial('<?php echo $this->getModuleName() ?>/list_footer', array('pager' => $pager, 'helper' => $helper)) ?]
</div>