<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', array("current_parent" => "settings", "current_child" => "academic_settings", "current_link" => "courses")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Academics" => "academic", "Academic Settings" => "academic_settings", "Courses" => "course"))) ?>
<?php end_slot() ?>

<?php include_partial('course/flashes') ?>
<div id="sf_admin_heading">
    <h3><?php echo __('Courses', array(), 'messages') ?></h3>
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