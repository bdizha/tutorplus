<ul class="sf_admin_actions">
    <?php if ($form->isNew()): ?>
        <li class="sf_admin_action_cancel">
            <?php if (method_exists($helper, 'linkTo_cancel')): ?>
                <?php echo $helper->linkTo_cancel($form->getObject(), array('params' => array(), 'class_suffix' => 'cancel', 'label' => 'Cancel',)) ?>
            <?php else: ?>
                <?php echo link_to(__('Cancel', array(), 'messages'), 'course_link/List_cancel?id=' . $course_link->getId(), array()) ?>
            <?php endif; ?>
        </li>
        <?php echo $helper->linkToSave($form->getObject(), array('params' => array(), 'class_suffix' => 'save', 'label' => 'Save',)) ?>
    <?php else: ?>
        <li class="sf_admin_action_cancel">
            <?php if (method_exists($helper, 'linkTo_cancel')): ?>
                <?php echo $helper->linkTo_cancel($form->getObject(), array('params' => array(), 'class_suffix' => 'cancel', 'label' => 'Cancel',)) ?>
            <?php else: ?>
                <?php echo link_to(__('Cancel', array(), 'messages'), 'course_link/List_cancel?id=' . $course_link->getId(), array()) ?>
            <?php endif; ?>
        </li>
        <?php echo $helper->linkToSave($form->getObject(), array('params' => array(), 'class_suffix' => 'save', 'label' => 'Save',)) ?>
        <li class="sf_admin_action_done">
            <?php if (method_exists($helper, 'linkTo_done')): ?>
                <?php echo $helper->linkTo_done($form->getObject(), array('params' => array(), 'class_suffix' => 'done', 'label' => 'Done',)) ?>
            <?php else: ?>
                <?php echo link_to(__('Done', array(), 'messages'), 'course_link/List_done?id=' . $course_link->getId(), array()) ?>
            <?php endif; ?>
        </li>
    <?php endif; ?>
</ul>

<script type='text/javascript'>
    $(document).ready(function(){        
        $(".sf_admin_action_cancel a").click(function(){        
            $("#simplemodal-close").click();
            return false;
        });
        
        $(".sf_admin_action_save input").click(function(){ 
            $("#course_link_form").ajaxSubmit(function(data){
                $("#modal-body").html(data);
            });            
            return false;
        });
        
        $(".sf_admin_action_done a").click(function(){        
            if(!isSuccess($("#modal-body").html())){
                $("#simplemodal-close").click();
                return false;
            }
            else{                
                fetchCourseLinks();
                $("#simplemodal-close").click();
                return false;
            }
        });
    });
    
    function isSuccess(value){  
        var regex = /successfully/;
        
        return regex.test(value);
    }
</script>
