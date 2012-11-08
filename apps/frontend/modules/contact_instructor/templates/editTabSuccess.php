<?php use_helper('I18N', 'Date') ?>
<?php include_partial('contact_instructor/flashes', array('form' => $form)) ?>
<?php include_partial('contact_instructor/form_new', array('contact_instructor' => $contact_instructor, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
<div id="sf_admin_footer">
    <input id="instructor_id" type="hidden" value="<?php echo $sf_user->getMyAttribute('instructor_show_id', null) ?>" name="instructor[id]">
    <?php include_partial('contact_instructor/form_footer', array('contact_instructor' => $contact_instructor, 'form' => $form, 'configuration' => $configuration)) ?>
</div>