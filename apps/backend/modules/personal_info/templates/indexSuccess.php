<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_tertiary', array("item_level_1" => "profile", "item_level_2" => "my_profile", "current_route" => "personal_info", "include_bottom_block" => true, "bottom_block" => "profile/correspondents")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Profile" => "profile", "My Info" => "personal_info"))) ?>
<?php end_slot() ?>

<?php include_partial('common/flashes') ?>
<div class="sf_admin_heading">
    <h3><?php echo __('My Info', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_content">
    <div class="content-block" id="profile-info">
        <?php include_component("profile", "info") ?>
    </div>
    <div class="content-block" id="personal-details">
        <?php include_partial('details', array("profile" => $profile)); ?>    
    </div>
    <div class="content-block" id="profile_photo"></div>
</div>
<script type="text/javascript">
    $(document).ready(function(){        
        $("#profile_photo").load("/backend.php/profile_photo");
    });
</script>