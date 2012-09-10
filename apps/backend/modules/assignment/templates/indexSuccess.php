<?php use_helper('I18N', 'Date') ?>
<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_secondary', array("item_level_1" => "dashboard_course", "item_level_2" => "course_home", "Course Home", "current_route" => "assignment")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Dashboard" => "dashboard", "My Courses" => "my_courses", "Course ~ "  . $course->getCode() => "course/" . $course->getId(), "Assignments" => "assignment"))) ?>
<?php end_slot() ?>
<?php include_partial('assignment/flashes') ?>
<div class="sf_admin_heading">
    <h3><?php echo __('Assignments', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_content">
    <?php include_partial('assignment/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
        <?php include_partial('assignment/list_batch_actions', array('helper' => $helper)) ?>
        <?php include_partial('assignment/list_actions', array('helper' => $helper)) ?>
    </ul>
</div>
<div id="sf_admin_footer">
    <?php include_partial('assignment/list_footer', array('pager' => $pager)) ?>
</div>