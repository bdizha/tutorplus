<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->newLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->newBreadcrumbs()) ?>
<?php end_slot() ?>

<?php include_partial('student/flashes', array('form' => $form)) ?>
<div class="sf_admin_heading">
    <h3><?php echo __('New Student Details', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">
    <div id="sf_admin_content">
        <?php include_partial('student/form', array('student' => $student, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
    </div>
    <div id="sf_admin_footer">
        <?php include_partial('student/form_footer', array('student' => $student, 'form' => $form, 'configuration' => $configuration)) ?>
    </div>
</div>
<script type='text/javascript'>
    $(document).ready(function(){
        // hide the academic and contact details links
        $("#student_academic_details_item").hide();
        $("#student_contact_details_item").hide();
        
        // remove the bottom border from the student details link
        $("#student_details_item").attr("style", "border-bottom:none");
    });
</script>