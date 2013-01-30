<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->indexLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs()) ?>
<div class="sf_admin_heading">
    <h3><?php echo __('Course Discussions', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_content">
    <div class="content-block">
        <div id="discussion_group_container">
            <ul class="top-actions">
                <?php include_partial('course_discussion/list_actions', array('helper' => $helper)) ?>
            </ul>
            <?php include_partial('course_discussion/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
            <ul class="sf_admin_actions">
                <?php include_partial('course_discussion/list_batch_actions', array('helper' => $helper)) ?>
                <?php include_partial('course_discussion/list_actions', array('helper' => $helper)) ?>
                <?php include_partial('course_discussion/list_footer', array('helper' => $helper)) ?>
            </ul>
        </div>
    </div>
</div>