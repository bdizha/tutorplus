<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', array("current_parent" => "settings", "current_child" => "academic_settings", "current_link" => "academic_years")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Academic Years" => "academic_year"))) ?>
<?php end_slot() ?>

<?php include_partial('academic_year/flashes') ?>  
<div id="sf_admin_content">
    <?php include_partial('academic_year/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
        <?php include_partial('academic_year/list_batch_actions', array('helper' => $helper)) ?>
        <?php include_partial('academic_year/list_actions', array('helper' => $helper)) ?>
    </ul>
</div>
<div id="sf_admin_footer">
    <?php include_partial('academic_year/list_footer', array('pager' => $pager)) ?>
</div>