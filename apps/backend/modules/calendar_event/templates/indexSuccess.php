<?php use_helper('I18N', 'Date') ?>
<?php include_partial('calendar_event/assets') ?>

<?php include_partial('calendar_event/flashes') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_secondary', array("item_level_1" => sfConfig::get("app_menu_item_level_1_calendar_event"), "item_level_2" => sfConfig::get("app_menu_item_level_2_calendar_event"), "current_route" => "calendar_event")) ?>
<?php end_slot() ?>

<?php include_partial('common/breadcrumb', array('breadcrumbs' => array("Dashboard" => "dashboard", "Home" => "dashboard", "My Calendar" => "my_calendar", "Events" => "event"))) ?>

<div class="sf_admin_heading">
    <h3><?php echo __('Calendar Events', array(), 'messages') ?></h3>
</div>

<div id="sf_admin_content">
    <?php include_partial('calendar_event/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
        <?php include_partial('calendar_event/list_batch_actions', array('helper' => $helper)) ?>
        <?php include_partial('calendar_event/list_actions', array('helper' => $helper)) ?>
    </ul>
</div>

<div id="sf_admin_footer">
    <?php include_partial('calendar_event/list_footer', array('pager' => $pager)) ?>
</div>