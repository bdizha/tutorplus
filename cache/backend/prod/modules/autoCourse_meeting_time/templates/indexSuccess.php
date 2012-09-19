<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->indexLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs()) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3><?php echo __('Courses Meeting Times', array(), 'messages') ?></h3>
</div>
<!--
<div id="sf_admin_header">
  <?php include_partial('course_meeting_time/list_header', array('pager' => $pager)) ?>
</div>
-->

<div id="sf_admin_content">
            <?php include_partial('course_meeting_time/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
        <ul class="sf_admin_actions">
            <?php include_partial('course_meeting_time/list_batch_actions', array('helper' => $helper)) ?>
            <?php include_partial('course_meeting_time/list_actions', array('helper' => $helper)) ?>
        </ul>
        </div>

<div id="sf_admin_footer">
    <?php include_partial('course_meeting_time/list_footer', array('pager' => $pager)) ?>
</div>