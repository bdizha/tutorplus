<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->editLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->editBreadcrumbs($notification_settings)) ?>
<?php end_slot() ?>

<?php include_partial('notification_settings/flashes', array('form' => $form)) ?>
<div class="sf_admin_heading">
    <h3><?php echo __('Notification Settings', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">
    <div id="sf_admin_content">
        <div class="content-block">
            <?php include_partial('notification_settings/form', array('notification_settings' => $notification_settings, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>            
        </div>
    </div>
</div>