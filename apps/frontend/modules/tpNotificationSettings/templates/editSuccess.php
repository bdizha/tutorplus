<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->getEditLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->getEditBreadcrumbs($notification_settings)) ?>
<div class="sf_admin_heading">
  <h3><?php echo __('Email Settings', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">
  <div id="sf_admin_content">
    <div class="content-block">
      <?php include_partial('notification_settings/form', array('notification_settings' => $notification_settings, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>            
    </div>
  </div>
</div>