<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->indexLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs()) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3><?php echo __('Profile List', array(), 'messages') ?></h3>
</div>
<!--<div id="sf_admin_header">
  <?php include_partial('profile/list_header', array('pager' => $pager)) ?>
</div>
--><!--
<div id="sf_admin_bar">
  <?php include_partial('profile/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
</div>
-->

<div id="sf_admin_content">
            <form action="<?php echo url_for('profile_collection', array('action' => 'batch')) ?>" method="post">
                <?php include_partial('profile/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
        <ul class="sf_admin_actions">
            <?php include_partial('profile/list_batch_actions', array('helper' => $helper)) ?>
            <?php include_partial('profile/list_actions', array('helper' => $helper)) ?>
        </ul>
                </form>
    </div>

<div id="sf_admin_footer">
    <?php include_partial('profile/list_footer', array('pager' => $pager)) ?>
</div>