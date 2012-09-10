<?php use_helper('I18N', 'Date') ?>
<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->contactDetailsLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->contactDetailsBreadcrumbs()) ?>
<?php end_slot() ?>

<div id="sf_admin_content">
    <?php include_partial('student_contact/settings'); ?>
</div>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){ 
    //]]
</script>