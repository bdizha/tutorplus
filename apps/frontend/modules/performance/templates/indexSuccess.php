<?php use_helper('I18N', 'Date') ?>
<?php include_partial('common/assets') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_tertiary', array("item_level_1" => "profile", "item_level_2" => "my_profile", "current_route" => "performance")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Profile" => "profile", "My Performance" => "performance"))) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3><?php echo __('My Performance', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_content">
    <div class="content-block">
        <?php include_component("profile", "info") ?>
    </div>
    <div class="content-block">
        This section is still under rigorous construction... :)
    </div
</div>