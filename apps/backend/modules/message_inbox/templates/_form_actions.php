<ul class="sf_admin_actions">
    <?php if ($form->isNew()): ?>
        <li class="sf_admin_action_save_draft">
            <?php if (method_exists($helper, 'linkTo_saveDraft')): ?>
                <?php echo $helper->linkTo_saveDraft($form->getObject(), array('params' => array(), 'class_suffix' => 'save_draft', 'label' => 'Save draft',)) ?>
            <?php else: ?>
                <?php echo link_to(__('Save draft', array(), 'messages'), 'message_inbox/List_saveDraft?id=' . $email_message->getId(), array()) ?>
            <?php endif; ?>
        </li>
        <li class="sf_admin_action_send">
            <?php if (method_exists($helper, 'linkTo_send')): ?>
                <?php echo $helper->linkTo_send($form->getObject(), array('params' => array(), 'class_suffix' => 'send', 'label' => 'Send',)) ?>
            <?php else: ?>
                <?php echo link_to(__('Send', array(), 'messages'), 'message_inbox/List_send?id=' . $email_message->getId(), array()) ?>
            <?php endif; ?>
        </li>
        <li class="sf_admin_action_cancel">
            <?php if (method_exists($helper, 'linkTo_cancel')): ?>
                <?php echo $helper->linkTo_cancel($form->getObject(), array('params' => array(), 'class_suffix' => 'cancel', 'label' => 'Cancel',)) ?>
            <?php else: ?>
                <?php echo link_to(__('Cancel', array(), 'messages'), 'message_inbox/List_cancel?id=' . $email_message->getId(), array()) ?>
            <?php endif; ?>
        </li>
    <?php else: ?>
        <?php echo $helper->linkToDelete($form->getObject(), array('params' => array(), 'confirm' => 'Are you sure?', 'class_suffix' => 'delete', 'label' => 'Delete',)) ?>
        <?php echo $helper->linkToList(array('params' => array(), 'class_suffix' => 'list', 'label' => 'Back to list',)) ?>
        <?php echo $helper->linkToSave($form->getObject(), array('params' => array(), 'class_suffix' => 'save', 'label' => 'Save',)) ?>
        <?php echo $helper->linkToSaveAndAdd($form->getObject(), array('params' => array(), 'class_suffix' => 'save_and_add', 'label' => 'Save and add',)) ?>
    <?php endif; ?>
</ul>