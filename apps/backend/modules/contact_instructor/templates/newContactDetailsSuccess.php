<?php use_helper('I18N', 'Date') ?>
<?php include_partial('contact_instructor/assets') ?>

<div class="sf_admin_heading">
    <h3><?php echo __('Edit Instructor: %%first_name%% %%last_name%%', array('%%first_name%%' => $instructor->getFirstName(), '%%last_name%%' => $instructor->getLastName()), 'messages') ?></h3>
</div>

<?php include_partial('instructor/heading_tabs', array('current' => "contact")) ?>

<div id="sf_admin_form_container">
    <?php include_partial('contact_instructor/flashes', array('form' => $form)) ?>

    <div id="sf_admin_header">
        <?php include_partial('contact_instructor/form_header', array('contact_instructor' => $contact_instructor, 'form' => $form, 'configuration' => $configuration)) ?>
    </div>

    <div id="sf_admin_content">
        <?php include_partial('contact_instructor/form', array('contact_instructor' => $contact_instructor, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
    </div>

    <div id="sf_admin_form_footer">
        <?php include_partial('contact_instructor/form_footer', array('contact_instructor' => $contact_instructor, 'form' => $form, 'configuration' => $configuration)) ?>
    </div>
</div>

<script type='text/javascript'>
    $(document).ready(function(){	
        $("#contact_instructor_instructor_id").val("<?php echo $instructor->getId() ?>");
        
        $("#tab_edit_instructor").click(function(){
            $("#sf_admin_container").load("instructor/<?php echo $instructor->getId() ?>/edit");
            return false;
        });

        $("#tab_edit_academic_details").click(function(){
            $("#sf_admin_container").load("instructor_academic_details/<?php echo $instructor->getId() ?>/edit");
            return false;
        });

        $("#tab_edit_contact_details").click(function(){
            $("#sf_admin_container").load("contact_instructor/new");
            return false;
        });
    });
</script>