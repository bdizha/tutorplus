<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_secondary', array("item_level_1" => "academics_instructor", "item_level_2" => "instructor_details", "current_route" => "instructor_details")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Academics" => "instructor", "Instructors" => "instructor", "Edit Instructor Details" => "instructor/" . $instructor->getId() . "/edit"))) ?>
<?php end_slot() ?>

<?php include_partial('instructor/flashes', array('form' => $form)) ?>
<div class="sf_admin_heading">
    <h3><?php echo __('Edit Instructor ~ %%first_name%% %%last_name%%', array('%%first_name%%' => $instructor->getFirstName(), '%%last_name%%' => $instructor->getLastName()), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">
    <div id="sf_admin_header">
        <?php include_partial('instructor/form_header', array('instructor' => $instructor, 'form' => $form, 'configuration' => $configuration)) ?>
    </div>
    <div id="sf_admin_content">
        <?php include_partial('instructor/form', array('instructor' => $instructor, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
    </div>
    <div id="sf_admin_footer">
        <?php include_partial('instructor/form_footer', array('instructor' => $instructor, 'form' => $form, 'configuration' => $configuration)) ?>
    </div>
</div>