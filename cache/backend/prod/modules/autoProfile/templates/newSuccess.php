<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->newLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->newBreadcrumbs()) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3><?php echo __('New Profile', array(), 'messages') ?></h3>
</div>

<?php include_partial('profile/flashes', array('form' => $form)) ?>

<div id="sf_admin_form_container">
    <div id="sf_admin_content">
        <?php include_partial('profile/form', array('sf_guard_user' => $sf_guard_user, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
    </div>
    <div id="sf_admin_footer">
        <?php include_partial('profile/form_footer', array('sf_guard_user' => $sf_guard_user, 'form' => $form, 'configuration' => $configuration)) ?>
    </div>
</div>
