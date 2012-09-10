<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', array("current_parent" => "settings", "current_child" => "academic_settings", "current_link" => "program_levels")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Program Levels" => "program_level"))) ?>
<?php end_slot() ?>
<?php include_partial('program_level/flashes') ?>  
<div id="sf_admin_content">
    <?php include_partial('program_level/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
        <?php include_partial('program_level/list_batch_actions', array('helper' => $helper)) ?>
        <?php include_partial('program_level/list_actions', array('helper' => $helper)) ?>
    </ul>
</div>
<div id="sf_admin_footer">
    <?php include_partial('program_level/list_footer', array('pager' => $pager)) ?>
</div>