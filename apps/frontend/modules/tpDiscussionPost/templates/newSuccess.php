<?php use_helper('I18N', 'Date') ?>
<div id="sf_admin_form_container">
    <?php include_partial('tpDiscussionPost/form', array('discussion_post' => $discussion_post, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
</div>
