<ul class="sf_admin_actions" id="sf_admin_actions_<?php echo $this->getModuleName() ?>">
                        <?php if ($form->isNew()): ?>
                                            <li class="sf_admin_action_cancel">
                    <?php if (method_exists($helper, 'linkToCancel')): ?>
                    <?php echo $helper->linkToCancel($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'cancel',  'label' => 'Cancel',)) ?>
                    <?php else: ?>
                    <?php echo link_to(__('Cancel', array(), 'messages'), 'student_contact/ListCancel?id='.$student_contact->getId(), array()) ?>
                    <?php endif; ?>
                </li>
                                                <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Save',)) ?>
                                            <?php else: ?>
                                            <li class="sf_admin_action_cancel">
                    <?php if (method_exists($helper, 'linkToCancel')): ?>
                    <?php echo $helper->linkToCancel($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'cancel',  'label' => 'Cancel',)) ?>
                    <?php else: ?>
                    <?php echo link_to(__('Cancel', array(), 'messages'), 'student_contact/ListCancel?id='.$student_contact->getId(), array()) ?>
                    <?php endif; ?>
                </li>
                                                <li class="sf_admin_action_done">
                    <?php if (method_exists($helper, 'linkToDone')): ?>
                    <?php echo $helper->linkToDone($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'done',  'label' => 'Done',)) ?>
                    <?php else: ?>
                    <?php echo link_to(__('Done', array(), 'messages'), 'student_contact/ListDone?id='.$student_contact->getId(), array()) ?>
                    <?php endif; ?>
                </li>
                                                <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Save',)) ?>
                            <?php endif; ?>
</ul>