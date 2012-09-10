<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', array("current_parent" => "settings", "current_child" => "academic_settings", "current_link" => "courses")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Academics" => "academic", "Academic Settings" => "academic_settings", "Courses" => "course", "Edit Course ~ "  . $course->getCode() => "course/" . $course->getId()))) ?>
<?php end_slot() ?>

<?php include_partial('course/flashes') ?>
<div class="sf_admin_heading">
    <h3><?php echo __('Edit Course', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">	
    <div id="sf_admin_content">
        <?php include_partial('course/form', array('course' => $course, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
    </div>	
    <div id="sf_admin_footer">
        <?php include_partial('course/form_footer', array('course' => $course, 'form' => $form, 'configuration' => $configuration)) ?>
    </div>
</div>