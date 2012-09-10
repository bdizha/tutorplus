<?php use_helper('I18N', 'Date') ?>
<?php include_partial('calendar/assets') ?>

<?php include_partial('calendar/flashes') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_secondary', array("item_level_1" => "dashboard2", "item_level_2" => "calendar_home", "current_route" => "calendar")) ?>
<?php end_slot() ?>

<?php include_partial('common/breadcrumb', array('breadcrumbs' => array("Dashboard" => "dashboard", "Home" => "dashboard", "My Calendar" => "my_calendar", "Calendars" => "calendar"))) ?>

<div class="sf_admin_heading">
    <h3><?php echo __('Calendars', array(), 'messages') ?></h3>
</div>	

<div id="sf_admin_content">
    <?php include_partial('calendar/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
        <?php include_partial('calendar/list_batch_actions', array('helper' => $helper)) ?>
        <?php include_partial('calendar/list_actions', array('helper' => $helper)) ?>
    </ul>
</div>

<div id="sf_admin_footer">
    <?php include_partial('calendar/list_footer', array('pager' => $pager)) ?>
</div>