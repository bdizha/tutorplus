<?php use_helper('I18N', 'Date') ?>
<div id="cboxLoadedContentInner">
    <div id="sf_admin_form_container">
        <div id="sf_admin_form_content">
            <?php include_partial('profile_award/flashes', array('form' => $form)) ?>
            <?php include_partial('profile_award/form', array('profile_award' => $profile_award, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
        </div>
        <div id="sf_admin_form_footer">
            <?php include_partial('profile_award/form_footer', array('profile_award' => $profile_award, 'form' => $form, 'configuration' => $configuration)) ?>
        </div>
    </div>
</div>