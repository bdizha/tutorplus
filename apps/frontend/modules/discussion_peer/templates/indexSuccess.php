<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php if (!is_null($course)): ?>
    <?php include_component('common', 'menu', $helper->courseLinks($discussion)) ?>
<?php else: ?>
    <?php include_component('common', 'menu', $helper->discussionLinks($discussion)) ?>
<?php endif; ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php if (!is_null($course)): ?>
    <?php include_partial('common/breadcrumbs', $helper->courseBreadcrumbs($discussion)) ?>
<?php else: ?>
    <?php include_partial('common/breadcrumbs', $helper->discussionBreadcrumbs($discussion)) ?>
<?php endif; ?>
<?php end_slot() ?>

<?php include_partial('discussion_member/flashes') ?>

<div class="sf_admin_heading">
    <h3><?php echo __('Discussion ~ Followers', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_content">
    <?php include_partial('discussion_member/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
        <?php include_partial('discussion_member/list_batch_actions', array('helper' => $helper)) ?>
        <?php include_partial('discussion_member/list_actions', array('helper' => $helper)) ?>
    </ul>
</div>