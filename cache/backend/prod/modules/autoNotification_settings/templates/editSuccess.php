<?php use_helper('I18N', 'Date') ?>
<?php include_partial('notification_settings/flashes', array('form' => $form)) ?>
<div class="sf_admin_heading">
    <h3><?php echo __('Edit Notification Settings', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">	
    <div id="sf_admin_content">
        <?php include_partial('notification_settings/form', array('notification_settings' => $notification_settings, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
    </div>	
    <div id="sf_admin_footer">
        <?php include_partial('notification_settings/form_footer', array('notification_settings' => $notification_settings, 'form' => $form, 'configuration' => $configuration)) ?>
    </div>
</div>