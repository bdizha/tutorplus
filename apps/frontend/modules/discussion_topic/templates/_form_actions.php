<ul class="sf_admin_actions">
    <?php if ($form->isNew()): ?>
        <?php echo $helper->linkToDelete($form->getObject(), array('params' => array(), 'confirm' => 'Are you sure?', 'class_suffix' => 'delete', 'label' => 'Delete',), true) ?>
        <li class="sf_admin_action_cancel">
            <?php if (method_exists($helper, 'linkToCancel')): ?>
                <?php echo $helper->linkToCancel($form->getObject(), array('params' => array(), 'class_suffix' => 'cancel', 'label' => 'Cancel',)) ?>
            <?php else: ?>
                <?php echo link_to(__('Cancel', array(), 'messages'), 'discussion_topic/ListCancel?id=' . $discussion_topic->getId(), array()) ?>                    <?php endif; ?>
        </li>
        <?php echo $helper->linkToSave($form->getObject(), array('params' => array(), 'class_suffix' => 'save', 'label' => 'Save',)) ?>
    <?php else: ?>
        <?php echo $helper->linkToDelete($form->getObject(), array('params' => array(), 'confirm' => 'Are you sure?', 'class_suffix' => 'delete', 'label' => 'Delete',), true) ?>
        <li class="sf_admin_action_cancel">
            <?php if (method_exists($helper, 'linkToCancel')): ?>
                <?php echo $helper->linkToCancel($form->getObject(), array('params' => array(), 'class_suffix' => 'cancel', 'label' => 'Cancel',)) ?>
            <?php else: ?>
                <?php echo link_to(__('Cancel', array(), 'messages'), 'discussion_topic/ListCancel?id=' . $discussion_topic->getId(), array()) ?>                    <?php endif; ?>
        </li>
        <li class="sf_admin_action_done">
            <?php if (method_exists($helper, 'linkToDone')): ?>
                <?php echo $helper->linkToDone($form->getObject(), array('params' => array(), 'class_suffix' => 'done', 'label' => 'Done',)) ?>
            <?php else: ?>
                <?php echo link_to(__('Done', array(), 'messages'), 'discussion_topic/ListDone?id=' . $discussion_topic->getId(), array()) ?>                    <?php endif; ?>
        </li>
        <?php echo $helper->linkToSave($form->getObject(), array('params' => array(), 'class_suffix' => 'save', 'label' => 'Save',)) ?>
    <?php endif; ?>
</ul>
<script type='text/javascript'>
    $(document).ready(function(){   
        $("#discussion_topic_form_holder .cancel, #discussion_topic_form_holder .done").click(function(){
            // check whether on the discussion page or discussion list page
            if($("#discussion_members").html() == undefined){
                window.location = window.location.href;
            }
            else{
                fetchContent('/discussion_topic');
            }
            $.fn.colorbox.close();
            return false;
        });
        
        $('#discussion_topic_form_holder .save').click(function(){            
            $("#cboxLoadedContentInner").hide();
            $("#cboxLoadedContent").append(loadingHtml);
            
            $("#discussion_topic_form").ajaxSubmit(function(data){
                $("#cboxLoadedContent").html(data);                
                $.fn.colorbox.resize();
            });
        });
    });
</script>
