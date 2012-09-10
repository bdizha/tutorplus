<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->editLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->editBreadcrumbs()) ?>
<?php end_slot() ?>

<?php include_partial('student/flashes', array('form' => $form)) ?>
<div class="sf_admin_heading">
    <h3><?php echo __('Edit Student Details ~ %%first_name%% %%last_name%%', array('%%first_name%%' => $student->getFirstName(), '%%last_name%%' => $student->getLastName()), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">
    <div id="sf_admin_header">
        <?php include_partial('student/form_header', array('student' => $student, 'form' => $form, 'configuration' => $configuration)) ?>
    </div>
    <div id="sf_admin_content">
        <?php include_partial('student/form', array('student' => $student, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
    </div>
    <div id="sf_admin_footer">
        <?php include_partial('student/form_footer', array('student' => $student, 'form' => $form, 'configuration' => $configuration)) ?>
    </div>
</div>