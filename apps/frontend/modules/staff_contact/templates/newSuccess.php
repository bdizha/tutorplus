<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_secondary', array("item_level_1" => "academics_staff", "item_level_2" => "staff_details", "current_route" => "staff_contact")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Academics" => "staff", "Staff" => "staff", __('New Contact Details ~ %%first_name%% %%last_name%%', array('%%first_name%%' => $staff->getFirstName(), '%%last_name%%' => $staff->getLastName()), 'messages') => "staff_contact/new"))) ?>
<?php end_slot() ?>

<?php include_partial('staff_contact/flashes', array('form' => $form)) ?>
<div class="sf_admin_heading">
    <h3><?php echo __('New Contact Details ~ %%first_name%% %%last_name%%', array('%%first_name%%' => $staff->getFirstName(), '%%last_name%%' => $staff->getLastName()), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">
    <div id="sf_admin_header">
        <?php include_partial('staff_contact/form_header', array('staff_contact' => $staff_contact, 'form' => $form, 'configuration' => $configuration)) ?>
    </div>
    <div id="sf_admin_content">
        <?php include_partial('staff_contact/form', array('staff_contact' => $staff_contact, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
    </div>
</div>