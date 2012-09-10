<?php use_helper('I18N', 'Date') ?>
<?php include_partial('common/assets') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_tertiary', array("item_level_1" => "profile", "item_level_2" => "my_profile", "current_route" => "student_contact", "include_bottom_block" => true, "bottom_block" => "profile/correspondents")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Profile" => "profile", "My Contact Details" => "student_contact"))) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3><?php echo __('My Contact Details', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_content">
    <div id="contact-details">
        <?php include_partial('settings'); ?>    
    </div> 
</div>
<script type="text/javascript">
    $(document).ready(function(){
    });
</script>