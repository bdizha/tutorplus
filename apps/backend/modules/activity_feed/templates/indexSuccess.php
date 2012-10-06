<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->indexLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs()) ?>
<?php end_slot() ?>

<?php include_partial('activity_feed/flashes') ?>
<div class="content-block" style="margin-top: 10px">
    <h2>Notifications</h2>
    <div class="full-block" id="activity_feeds">
        <?php include_partial('activity_feed/list', array("activityFeeds" => $activityFeeds)) ?>
    </div>
</div>