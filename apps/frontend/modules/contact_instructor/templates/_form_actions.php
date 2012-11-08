<ul class="sf_admin_actions">
    <?php if ($form->isNew()): ?>
        <li class="sf_admin_action_cancel">
            <?php if (method_exists($helper, 'linkTo_cancel')): ?>
                <?php echo $helper->linkTo_cancel($form->getObject(), array('params' => array(), 'class_suffix' => 'cancel', 'label' => 'Cancel',)) ?>
            <?php else: ?>
                <?php echo link_to(__('Cancel', array(), 'messages'), 'contact_instructor/List_cancel?id=' . $contact_instructor->getId(), array()) ?>
            <?php endif; ?>
        </li>
        <?php echo $helper->linkToSave($form->getObject(), array('params' => array(), 'class_suffix' => 'save', 'label' => 'Save',)) ?>
    <?php else: ?>
        <li class="sf_admin_action_cancel">
            <?php if (method_exists($helper, 'linkTo_cancel')): ?>
                <?php echo $helper->linkTo_cancel($form->getObject(), array('params' => array(), 'class_suffix' => 'cancel', 'label' => 'Cancel',)) ?>
            <?php else: ?>
                <?php echo link_to(__('Cancel', array(), 'messages'), 'contact_instructor/List_cancel?id=' . $contact_instructor->getId(), array()) ?>
            <?php endif; ?>
        </li>
        <?php echo $helper->linkToSave($form->getObject(), array('params' => array(), 'class_suffix' => 'save', 'label' => 'Save',)) ?>
        <li class="sf_admin_action_done">
            <?php if (method_exists($helper, 'linkTo_done')): ?>
                <?php echo $helper->linkTo_done($form->getObject(), array('params' => array(), 'class_suffix' => 'done', 'label' => 'Done',)) ?>
            <?php else: ?>
                <?php echo link_to(__('Done', array(), 'messages'), 'contact_instructor/List_done?id=' . $contact_instructor->getId(), array()) ?>
            <?php endif; ?>
        </li>
    <?php endif; ?>
</ul>

<script type='text/javascript'>
    $(document).ready(function(){        
        $('html, body').animate({scrollTop: '0px'}, 100);
        $('.save').click(function(){		
            $("#contact_instructor_form").ajaxSubmit(function(data){
                $("#sf_admin_container").html(data);
            });            
            return false;
        });      
        
        $(".sf_admin_action_cancel a").click(function(){        
            window.location.href = "/instructor";
            return false;
        });        
        
        $(".sf_admin_action_done a").click(function(){  
            window.location.href = "/instructor";        
            return false;
        });
    });
    
    function isSuccess(value){  
        var regex = /successfully/;
        
        return regex.test(value);
    }
</script>

