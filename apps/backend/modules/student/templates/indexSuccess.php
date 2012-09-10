<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->indexLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs()) ?>
<?php end_slot() ?>

<?php include_partial('student/flashes') ?>
<div id="sf_admin_heading">
    <h3><?php echo __('Students', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_content">
    <?php include_partial('student/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
        <?php include_partial('student/list_batch_actions', array('helper' => $helper)) ?>
        <?php include_partial('student/list_actions', array('helper' => $helper)) ?>
    </ul>
</div>
<div id="sf_admin_footer">
    <?php include_partial('student/list_footer', array('pager' => $pager)) ?>
</div>