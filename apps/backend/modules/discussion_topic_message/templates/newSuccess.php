<?php use_helper('I18N', 'Date') ?>
<?php include_partial('discussion_topic_message/assets') ?>
	
<div id="sf_admin_form_container">
  <?php include_partial('discussion_topic_message/flashes', array('form' => $form)) ?>

  <div id="sf_admin_header">
    <?php include_partial('discussion_topic_message/form_header', array('discussion_topic_message' => $discussion_topic_message, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('discussion_topic_message/form', array('discussion_topic_message' => $discussion_topic_message, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('discussion_topic_message/form_footer', array('discussion_topic_message' => $discussion_topic_message, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
  