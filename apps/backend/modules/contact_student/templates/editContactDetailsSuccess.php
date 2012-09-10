<?php use_helper('I18N', 'Date') ?>

<div class="sf_admin_heading">
    <h3><?php echo __('Edit Student: %%first_name%% %%last_name%%', array('%%first_name%%' => $student_contact->getStudent()->getFirstName(), '%%last_name%%' => $student_contact->getStudent()->getLastName()), 'messages') ?></h3>
</div>

<?php include_partial('student/heading_tabs', array('current' => "contact")) ?>

<div id="sf_admin_form_container">
  <?php include_partial('student_contact/flashes', array('form' => $form)) ?>

  <div id="sf_admin_header">
    <?php include_partial('student_contact/form_header', array('student_contact' => $student_contact, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('student_contact/form', array('student_contact' => $student_contact, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>
</div> 

<script type='text/javascript'>
    $(document).ready(function(){	
        $("#tab_edit_student").click(function(){
            $("#sf_admin_container").load("student/<?php echo $student_contact->getStudentId() ?>/edit");
            return false;
        });

        $("#tab_edit_academic_details").click(function(){
            $("#sf_admin_container").load("student_academic_details/<?php echo $student_contact->getStudentId() ?>/edit");
            return false;
        });

        $("#tab_edit_contact_details").click(function(){
            $("#sf_admin_container").load("student_contact/<?php echo $student_contact->getId() ?>/edit");
            return false;
        });
    });
</script>