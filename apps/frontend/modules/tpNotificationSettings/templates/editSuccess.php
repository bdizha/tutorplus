<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getLinks()) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->getBreadcrumbs()) ?>
<?php include_partial('tpCommon/flashes_normal') ?>
<div class="sf_admin_heading">
  <h3><?php echo __('Notification Settings', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">
  <div id="sf_admin_content">
    <div class="content-block">
      <?php include_partial('tpNotificationSettings/form', array('notification_settings' => $notification_settings, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>            
    </div>
  </div>
</div>