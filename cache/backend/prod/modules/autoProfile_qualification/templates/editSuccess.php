<?php use_helper('I18N', 'Date') ?>
<div id="cboxLoadedContentInner">
    <div id="sf_admin_form_container">
        <div id="sf_admin_form_content">
            <?php include_partial('profile_qualification/flashes', array('form' => $form)) ?>
            <?php include_partial('profile_qualification/form', array('profile_qualification' => $profile_qualification, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
        </div>
    </div>
</div>