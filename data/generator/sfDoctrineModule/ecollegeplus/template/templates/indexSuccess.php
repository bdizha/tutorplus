[?php use_helper('I18N', 'Date') ?]
  [?php include_partial('<?php echo $this->getModuleName() ?>/flashes') ?]  
  [?php slot('nav_vertical') ?]
	  [?php include_partial('common/nav_vertical', array("item_level_1" => sfConfig::get("app_menu_item_level_1_<?php echo $this->getModuleName() ?>"), "item_level_2" => sfConfig::get("app_menu_item_level_2_<?php echo $this->getModuleName() ?>"), "current_route" => "<?php echo $this->getModuleName() ?>")) ?]
	[?php end_slot() ?]
  
	<div class="sf_admin_heading">
  	<h3>[?php echo <?php echo $this->getI18NString('list.title') ?> ?]</h3>
  </div>
  <!--
  <div id="sf_admin_header">
    [?php include_partial('<?php echo $this->getModuleName() ?>/list_header', array('pager' => $pager)) ?]
  </div>
	-->
	<?php if($this->configuration->hasFilterForm()): ?>
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
    [?php include_partial('<?php echo $this->getModuleName() ?>/list_footer', array('pager' => $pager)) ?]
  </div>