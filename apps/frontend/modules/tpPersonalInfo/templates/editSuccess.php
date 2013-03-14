<?php use_helper('I18N', 'Date') ?>
<div id="cboxLoadedContentInner">
    <div id="sf_admin_form_container">
        <div id="sf_admin_form_content">
            <?php include_partial('common/flashes_normal', array('form' => $form)) ?> 
            <?php include_partial('personal_info/form', array('form' => $form)) ?>
        </div>  
    </div>
</div>