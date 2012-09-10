<?php use_helper('I18N', 'Date') ?>
<?php include_partial('instructor/flashes', array('form' => $form)) ?>
<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_secondary', array("item_level_1" => "academics_instructor", "item_level_2" => "instructor_details", "current_route" => "instructor_details")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Academics" => "academics", "Instructors" => "instructor", "New Instructor Details" => "instructor/new"))) ?>
<?php end_slot() ?>
<div class="sf_admin_heading">
    <h3><?php echo __('New Instructor', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">
    <div id="sf_admin_content">
        <?php include_partial('instructor/form', array('instructor' => $instructor, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
    </div>
    <div id="sf_admin_footer">
        <?php include_partial('instructor/form_footer', array('instructor' => $instructor, 'form' => $form, 'configuration' => $configuration)) ?>
    </div>
</div>
<script type='text/javascript'>
    $(document).ready(function(){
        // hide the academic and contact details links
        $("#instructor_academic_settings_item").hide();
        $("#instructor_contact_item").hide();
        
        // remove the bottom border from the instructor details link
        $("#instructor_details_item").attr("style", "border-bottom:none");
    });
</script>