<?php use_helper('I18N', 'Date') ?>
<?php include_partial('instructor/flashes') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical', array("item_level_1" => "academics", "item_level_2" => "academic_personnel", "current_route" => "instructor")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Academics" => "student", "Academic Personnel" => "academic_personnel", "Instructors" => "instructor"))) ?>
<?php end_slot() ?>
<div id="sf_admin_heading">
    <h3><?php echo __('Instructors', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_content">
    <?php include_partial('instructor/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
        <?php include_partial('instructor/list_batch_actions', array('helper' => $helper)) ?>
        <?php include_partial('instructor/list_actions', array('helper' => $helper)) ?>
    </ul>
</div>
<div id="sf_admin_footer">
    <?php include_partial('instructor/list_footer', array('pager' => $pager)) ?>
</div>