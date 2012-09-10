<?php use_helper('I18N', 'Date') ?>
<?php include_partial('student_contact/assets') ?>

  <?php include_partial('student_contact/flashes') ?>
  
  <?php slot('nav_vertical') ?>
	  <?php include_partial('common/nav_vertical', array("item_level_1" => sfConfig::get("app_menu_item_level_1_student_contact"), "item_level_2" => sfConfig::get("app_menu_item_level_2_student_contact"), "current_route" => "student_contact")) ?>
	<?php end_slot() ?>
	
	<div class="sf_admin_heading">
  	<h3><?php echo __('Student Contacts', array(), 'messages') ?></h3>
  </div>
  <!--<div id="sf_admin_header">
    <?php include_partial('student_contact/list_header', array('pager' => $pager)) ?>
  </div>
-->
  <div id="sf_admin_content">
    <?php include_partial('student_contact/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('student_contact/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('student_contact/list_actions', array('helper' => $helper)) ?>
    </ul>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('student_contact/list_footer', array('pager' => $pager)) ?>
  </div>