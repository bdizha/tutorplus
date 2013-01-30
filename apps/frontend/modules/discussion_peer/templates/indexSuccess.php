<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php if (!is_null($course)): ?>
    <?php include_component('common', 'secureMenu', $helper->courseLinks($discussionGroup)) ?>
<?php else: ?>
    <?php include_component('common', 'secureMenu', $helper->discussionGroupLinks($discussionGroup)) ?>
<?php endif; ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php if (!is_null($course)): ?>
    <?php include_partial('common/breadcrumbs', $helper->courseBreadcrumbs($discussionGroup)) ?>
<?php else: ?>
    <?php include_partial('common/breadcrumbs', $helper->discussionGroupBreadcrumbs($discussionGroup)) ?>
<?php endif; ?>
<?php end_slot() ?>

<?php include_partial('discussion_peer/flashes_normal') ?>

<div class="sf_admin_heading">
    <h3><?php echo __('Group ~ Peers', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_content">
    <?php include_partial('discussion_peer/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
        <?php include_partial('discussion_peer/list_batch_actions', array('helper' => $helper)) ?>
        <?php include_partial('discussion_peer/list_actions', array('helper' => $helper)) ?>
    </ul>
</div>