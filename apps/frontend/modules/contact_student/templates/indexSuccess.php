<?php use_helper('I18N', 'Date') ?>
<?php include_partial('common/assets') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_tertiary', array("item_level_1" => "profile", "item_level_2" => "my_profile", "current_route" => "student_contact", "include_bottom_block" => true, "bottom_block" => "profile/correspondents")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Profile" => "profile", "Contact Details" => "student_contact"))) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3><?php echo __('Contact Details', array(), 'messages') ?></h3>
</div>
<div class="content-block">
    <?php include_component("profile", "info") ?>
</div>
<div id="contact-details">
    <?php include_partial('details', array("profile" => $profile)); ?>    
</div>
<script type="text/javascript">
    $(document).ready(function(){
    });
</script>