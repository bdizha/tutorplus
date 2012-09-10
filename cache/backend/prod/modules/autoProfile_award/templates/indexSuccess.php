<?php use_helper('I18N', 'Date') ?>
  <?php include_partial('profile_award/flashes') ?>  
  <?php slot('nav_vertical') ?>
	  <?php include_partial('common/nav_vertical', array("item_level_1" => sfConfig::get("app_menu_item_level_1_profile_award"), "item_level_2" => sfConfig::get("app_menu_item_level_2_profile_award"), "current_route" => "profile_award")) ?>
	<?php end_slot() ?>
  
	<div class="sf_admin_heading">
  	<h3><?php echo __('Profile award List', array(), 'messages') ?></h3>
  </div>
  <!--
  <div id="sf_admin_header">
    <?php include_partial('profile_award/list_header', array('pager' => $pager)) ?>
  </div>
	-->
	  <!--
  <div id="sf_admin_bar">
    <?php include_partial('profile_award/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>
  -->
	
  <div id="sf_admin_content">
	    <form action="<?php echo url_for('profile_award_collection', array('action' => 'batch')) ?>" method="post">
	    <?php include_partial('profile_award/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('profile_award/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('profile_award/list_actions', array('helper' => $helper)) ?>
    </ul>
	    </form>
	  </div>

  <div id="sf_admin_footer">
    <?php include_partial('profile_award/list_footer', array('pager' => $pager)) ?>
  </div>