<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->indexLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs()) ?>
<div class="sf_admin_heading">
    <h3><?php echo __('%%code%% ~ %%name%%', array('%%code%%' => $course->getCode(), '%%name%%' => $course->getName()), 'messages') ?></h3>
</div>
<div id="sf_admin_content">
    <?php include_partial('common/flashes_normal') ?>
    <div class="content-block">
        <?php include_partial('common/tabs', array('tabs' => $helper->getIndexTabs($course))) ?>
        <div class="tab-block">
            <?php include_partial('course_discussion/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
            <ul class="sf_admin_actions">
                <?php include_partial('course_discussion/list_batch_actions', array('helper' => $helper)) ?>
                <?php include_partial('course_discussion/list_actions', array('helper' => $helper)) ?>
                <?php include_partial('course_discussion/list_footer', array('helper' => $helper)) ?>
            </ul>            
        </div>
    </div>
</div>