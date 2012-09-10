<?php use_helper('I18N', 'Date') ?>
<?php include_partial('common/assets') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_tertiary', array("item_level_1" => "profile", "item_level_2" => "my_profile", "current_route" => "notification_settings")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Profile" => "profile", "Account Settings" => "notification_settings"))) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3><?php echo __('Notification Settings', array(), 'messages') ?></h3>
</div>
<div class="content-block">
    <?php include_component("profile", "info") ?>
</div>
<div class="content-block" id="notification_settings"></div>
<script type="text/javascript">
    $(document).ready(function(){        
        $("#notification_settings").load("/backend.php/notification_settings_details");
    });
</script>