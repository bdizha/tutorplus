<?php use_helper('I18N', 'Date') ?>
<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', array("current_parent" => "dashboard", "current_child" => "my_dashboard", "current_link" => "activity_feeds")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Activity Feeds" => "activity_feed"))) ?>
<?php end_slot() ?>

<?php include_partial('activity_feed/flashes') ?>
<div class="sf_admin_heading">
    <h3><?php echo __('Activity Feeds', array(), 'messages') ?></h3>
</div>
<div class="content-block" style="margin-top: 10px">
    <h2>Notifications</h2>
    <div id="activity_feeds">
        <?php include_partial('activity_feed/list', array("activityFeeds" => $activityFeeds)) ?>
    </div>
</div>