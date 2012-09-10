<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_secondary', array("item_level_1" => "academics_student", "item_level_2" => "student_details", "current_route" => "student_contact_new")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Academics" => "student", "Students" => "student", __('New Contact Details ~ %%first_name%% %%last_name%%', array('%%first_name%%' => $student->getFirstName(), '%%last_name%%' => $student->getLastName()), 'messages') => "student_contact/new"))) ?>
<?php end_slot() ?>

<?php include_partial('student_contact/flashes', array('form' => $form)) ?>
<div class="sf_admin_heading">
    <h3><?php echo __('New Contact Details ~ %%first_name%% %%last_name%%', array('%%first_name%%' => $student->getFirstName(), '%%last_name%%' => $student->getLastName()), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">
    <div id="sf_admin_header">
        <?php include_partial('student_contact/form_header', array('student_contact' => $student_contact, 'form' => $form, 'configuration' => $configuration)) ?>
    </div>
    <div id="sf_admin_content">
        <?php include_partial('student_contact/form', array('student_contact' => $student_contact, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
    </div>
</div>