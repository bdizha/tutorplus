<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_secondary', array("item_level_1" => "academics_instructor", "item_level_2" => "instructor_details", "current_route" => "instructor_contact")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Academics" => "instructor", "Instructors" => "instructor", __('Edit Contact Details ~ %%first_name%% %%last_name%%', array('%%first_name%%' => $instructor->getFirstName(), '%%last_name%%' => $instructor->getLastName()), 'messages') => "instructor_contact/" . $instructor_contact->getId() . "/"))) ?>
<?php end_slot() ?>

<?php include_partial('instructor_contact/flashes', array('form' => $form)) ?>
<div class="sf_admin_heading">
    <h3><?php echo __('Edit Contact Details ~ %%first_name%% %%last_name%%', array('%%first_name%%' => $instructor->getFirstName(), '%%last_name%%' => $instructor->getLastName()), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">
    <div id="sf_admin_header">
        <?php include_partial('instructor_contact/form_header', array('instructor_contact' => $instructor_contact, 'form' => $form, 'configuration' => $configuration)) ?>
    </div>
    <div id="sf_admin_content">
        <?php include_partial('instructor_contact/form', array('instructor_contact' => $instructor_contact, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
    </div>
</div>