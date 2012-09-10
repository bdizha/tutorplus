<ul class="sf_admin_actions">
                        <?php if ($form->isNew()): ?>
                                            <li class="sf_admin_action_cancel">
                    <?php if (method_exists($helper, 'linkToCancel')): ?>
                    <?php echo $helper->linkToCancel($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'cancel',  'label' => 'Cancel',)) ?>
                    <?php else: ?>
                    <?php echo link_to(__('Cancel', array(), 'messages'), 'course_meeting_time/ListCancel?id='.$course_meeting_time->getId(), array()) ?>                    <?php endif; ?>
                </li>
                                                <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Save',)) ?>
                                            <?php else: ?>
                                            <?php echo $helper->linkToDelete($form->getObject(), array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',), true) ?>
                                                <li class="sf_admin_action_cancel">
                    <?php if (method_exists($helper, 'linkToCancel')): ?>
                    <?php echo $helper->linkToCancel($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'cancel',  'label' => 'Cancel',)) ?>
                    <?php else: ?>
                    <?php echo link_to(__('Cancel', array(), 'messages'), 'course_meeting_time/ListCancel?id='.$course_meeting_time->getId(), array()) ?>                    <?php endif; ?>
                </li>
                                                <li class="sf_admin_action_done">
                    <?php if (method_exists($helper, 'linkToDone')): ?>
                    <?php echo $helper->linkToDone($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'done',  'label' => 'Done',)) ?>
                    <?php else: ?>
                    <?php echo link_to(__('Done', array(), 'messages'), 'course_meeting_time/ListDone?id='.$course_meeting_time->getId(), array()) ?>                    <?php endif; ?>
                </li>
                                                <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Save',)) ?>
                            <?php endif; ?>
</ul>
<script type='text/javascript'>
    $(document).ready(function(){        
        $('#course_meeting_time_form_holder .save').click(function(){            
            $("#cboxLoadedContentInner").hide();
            $("#cboxLoadedContent").append(loadingHtml);
            
            $("#course_meeting_time_form").ajaxSubmit(function(data){
                $("#cboxLoadedContent").html(data);
                $.fn.colorbox.resize();
            });
        });
    });
</script>
