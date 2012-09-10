<?php use_helper('I18N', 'Date') ?>
  <?php include_partial('course_meeting_time/flashes') ?>  
  <?php slot('nav_vertical') ?>
	  <?php include_partial('common/nav_vertical', array("item_level_1" => sfConfig::get("app_menu_item_level_1_course_meeting_time"), "item_level_2" => sfConfig::get("app_menu_item_level_2_course_meeting_time"), "current_route" => "course_meeting_time")) ?>
	<?php end_slot() ?>
  
	<div class="sf_admin_heading">
  	<h3><?php echo __('Courses Meeting Times', array(), 'messages') ?></h3>
  </div>
  <!--
  <div id="sf_admin_header">
    <?php include_partial('course_meeting_time/list_header', array('pager' => $pager)) ?>
  </div>
	-->
	
  <div id="sf_admin_content">
	    <?php include_partial('course_meeting_time/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('course_meeting_time/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('course_meeting_time/list_actions', array('helper' => $helper)) ?>
    </ul>
	  </div>

  <div id="sf_admin_footer">
    <?php include_partial('course_meeting_time/list_footer', array('pager' => $pager)) ?>
  </div>