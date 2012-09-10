<?php use_helper('I18N', 'Date') ?>
<?php include_partial('profile/flashes', array('form' => $form)) ?>
<div class="sf_admin_heading">
    <h3><?php echo __('Edit Profile', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">	
    <div id="sf_admin_content">
        <?php include_partial('profile/form', array('sf_guard_user' => $sf_guard_user, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
    </div>	
    <div id="sf_admin_footer">
        <?php include_partial('profile/form_footer', array('sf_guard_user' => $sf_guard_user, 'form' => $form, 'configuration' => $configuration)) ?>
    </div>
</div>