<ul class="sf_admin_actions" id="sf_admin_actions_<?php echo $this->getModuleName() ?>">
                        <?php if ($form->isNew()): ?>
                                            <li class="sf_admin_action_cancel">
                    <?php if (method_exists($helper, 'linkTo_cancel')): ?>
                    <?php echo $helper->linkTo_cancel($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'cancel',  'label' => 'Cancel',)) ?>
                    <?php else: ?>
                    <?php echo link_to(__('Cancel', array(), 'messages'), 'profile/List_cancel?id='.$sf_guard_user->getId(), array()) ?>
                    <?php endif; ?>
                </li>
                                                <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Save',)) ?>
                                            <?php else: ?>
                                            <li class="sf_admin_action_cancel">
                    <?php if (method_exists($helper, 'linkTo_cancel')): ?>
                    <?php echo $helper->linkTo_cancel($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'cancel',  'label' => 'Cancel',)) ?>
                    <?php else: ?>
                    <?php echo link_to(__('Cancel', array(), 'messages'), 'profile/List_cancel?id='.$sf_guard_user->getId(), array()) ?>
                    <?php endif; ?>
                </li>
                                                <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Save',)) ?>
                                                <li class="sf_admin_action_done">
                    <?php if (method_exists($helper, 'linkTo_done')): ?>
                    <?php echo $helper->linkTo_done($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'done',  'label' => 'Done',)) ?>
                    <?php else: ?>
                    <?php echo link_to(__('Done', array(), 'messages'), 'profile/List_done?id='.$sf_guard_user->getId(), array()) ?>
                    <?php endif; ?>
                </li>
                            <?php endif; ?>
</ul>