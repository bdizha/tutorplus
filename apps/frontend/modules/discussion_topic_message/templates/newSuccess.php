<?php use_helper('I18N', 'Date') ?>
<div id="sf_admin_form_container">
    <?php include_partial('discussion_topic_message/flashes', array('form' => $form)) ?>
    <?php include_partial('discussion_topic_message/form', array('discussion_topic_message' => $discussion_topic_message, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
</div>
