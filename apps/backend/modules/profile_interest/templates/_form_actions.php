<ul class="sf_admin_actions">
    <?php if ($form->isNew()): ?>
        <li class="sf_admin_action_cancel">
            <?php if (method_exists($helper, 'linkToCancel')): ?>
                <?php echo $helper->linkToCancel($form->getObject(), array('params' => array(), 'class_suffix' => 'cancel', 'label' => 'Cancel',)) ?>
            <?php else: ?>
                <?php echo link_to(__('Cancel', array(), 'messages'), 'profile_interest/ListCancel?id=' . $profile_interest->getId(), array()) ?>                    <?php endif; ?>
        </li>
        <li class="sf_admin_action_save">
            <?php if (method_exists($helper, 'linkToSave')): ?>
                <?php echo $helper->linkToSave($form->getObject(), array('params' => array(), 'class_suffix' => 'save', 'label' => 'Save',)) ?>
            <?php else: ?>
                <?php echo link_to(__('Save', array(), 'messages'), 'profile_interest/ListSave?id=' . $profile_interest->getId(), array()) ?>                    <?php endif; ?>
        </li>
    <?php else: ?>
        <li class="sf_admin_action_cancel">
            <?php if (method_exists($helper, 'linkToCancel')): ?>
                <?php echo $helper->linkToCancel($form->getObject(), array('params' => array(), 'class_suffix' => 'cancel', 'label' => 'Cancel',)) ?>
            <?php else: ?>
                <?php echo link_to(__('Cancel', array(), 'messages'), 'profile_interest/ListCancel?id=' . $profile_interest->getId(), array()) ?>                    <?php endif; ?>
        </li>
        <li class="sf_admin_action_done">
            <?php if (method_exists($helper, 'linkToDone')): ?>
                <?php echo $helper->linkToDone($form->getObject(), array('params' => array(), 'class_suffix' => 'done', 'label' => 'Done',)) ?>
            <?php else: ?>
                <?php echo link_to(__('Done', array(), 'messages'), 'profile_interest/ListDone?id=' . $profile_interest->getId(), array()) ?>                    <?php endif; ?>
        </li>
        <?php echo $helper->linkToSave($form->getObject(), array('params' => array(), 'class_suffix' => 'save', 'label' => 'Save',)) ?>
    <?php endif; ?>
</ul>
<script type='text/javascript'>
    $(document).ready(function(){        
        $('#profile_interest_form_holder .save').click(function(){            
            $("#cboxLoadedContentInner").hide();
            $("#cboxLoadedContent").append(loadingHtml);
            
            $("#profile_interest_form").ajaxSubmit(function(data){
                $("#cboxLoadedContent").html(data);
                $.fn.colorbox.resize();
            });
        });
        
        $("#profile_interest_form_holder .cancel, #profile_interest_form_holder .done").click(function(){
            fetchInterests();
            $.fn.colorbox.close();
            return false;
        });
    });
</script>
