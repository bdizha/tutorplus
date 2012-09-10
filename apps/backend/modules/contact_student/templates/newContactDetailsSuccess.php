<?php use_helper('I18N', 'Date') ?>
<?php include_partial('student_contact/flashes') ?>

<div class="sf_admin_heading">
    <h3><?php echo __('Edit Student: %%first_name%% %%last_name%%', array('%%first_name%%' => $student->getFirstName(), '%%last_name%%' => $student->getLastName()), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">
    <div id="sf_admin_header">
        <?php include_partial('student_contact/form_header', array('student_contact' => $student_contact, 'form' => $form, 'configuration' => $configuration)) ?>
    </div>

    <div id="sf_admin_content">
        <?php include_partial('student_contact/form', array('student_contact' => $student_contact, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
    </div>

    <div id="sf_admin_form_footer">
        <?php include_partial('student_contact/form_footer', array('student_contact' => $student_contact, 'form' => $form, 'configuration' => $configuration)) ?>
    </div>
</div>