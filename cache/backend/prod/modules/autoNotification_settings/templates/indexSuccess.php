<?php use_helper('I18N', 'Date') ?>
<?php include_partial('notification_settings/assets') ?>

  <?php include_partial('notification_settings/flashes') ?>
  
  <?php slot('nav_vertical') ?>
	  <?php include_partial('common/nav_vertical', array("item_level_1" => sfConfig::get("app_menu_item_level_1_notification_settings"), "item_level_2" => sfConfig::get("app_menu_item_level_2_notification_settings"), "current_route" => "notification_settings")) ?>
	<?php end_slot() ?>
	
	<div class="sf_admin_heading">
  	<h3><?php echo __('Notification Settings', array(), 'messages') ?></h3>
  </div>
  <!--<div id="sf_admin_header">
    <?php include_partial('notification_settings/list_header', array('pager' => $pager)) ?>
  </div>
-->
  <div id="sf_admin_content">
    <?php include_partial('notification_settings/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('notification_settings/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('notification_settings/list_actions', array('helper' => $helper)) ?>
    </ul>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('notification_settings/list_footer', array('pager' => $pager)) ?>
  </div>