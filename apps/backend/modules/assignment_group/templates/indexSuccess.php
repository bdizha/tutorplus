<?php use_helper('I18N', 'Date') ?>
<?php include_partial('assignment_group/assets') ?>

<?php include_partial('assignment_group/flashes') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_secondary', array("item_level_1" => "academics2", "item_level_2" => "course_home", "current_route" => "assignment_group")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Academics" => "academics", "Courses" => "course", __('%%code%% - %%name%%', array('%%code%%' => $course->getCode(), '%%name%%' => $course->getName()), 'messages') => "course/" . $course->getId(), "Assignment Groups" => "assignment_group"))) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3><?php echo __('Assignment Groups', array(), 'messages') ?></h3>
</div>

<div id="sf_admin_content">
    <?php include_partial('assignment_group/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
        <?php include_partial('assignment_group/list_batch_actions', array('helper' => $helper)) ?>
        <?php include_partial('assignment_group/list_actions', array('helper' => $helper)) ?>
    </ul>
</div>

<div id="sf_admin_footer">
    <?php include_partial('assignment_group/list_footer', array('pager' => $pager)) ?>
</div>