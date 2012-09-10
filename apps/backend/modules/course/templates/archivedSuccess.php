<?php use_helper('I18N', 'Date') ?>
<?php include_partial('course/assets') ?>
<?php include_partial('course/flashes') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical', array("item_level_1" => 'dashboard', "item_level_2" => 'my_courses', "current_route" => "archived_courses")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("General Info" => "general_info", "Archived Courses" => "course"))) ?>
<?php end_slot() ?>

<div id="sf_admin_heading">
    <h3><?php echo __('Archived Courses', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_content">
    <?php include_partial('course/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
        <?php include_partial('course/list_batch_actions', array('helper' => $helper)) ?>
        <?php include_partial('course/list_actions', array('helper' => $helper)) ?>
    </ul>
</div>
<div id="sf_admin_footer">
    <?php include_partial('course/list_footer', array('pager' => $pager)) ?>
</div>