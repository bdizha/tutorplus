<ul class="sf_admin_actions">
    <?php if ($form->isNew()): ?>
        <li class="sf_admin_action_cancel">
            <?php if (method_exists($helper, 'linkToCancel')): ?>
                <?php echo $helper->linkToCancel($form->getObject(), array('params' => array(), 'class_suffix' => 'cancel', 'label' => 'Cancel',)) ?>
            <?php else: ?>
                <?php echo link_to(__('Cancel', array(), 'messages'), 'student_contact/List_cancel?id=' . $student_contact->getId(), array()) ?>
            <?php endif; ?>
        </li>
        <?php echo $helper->linkToSave($form->getObject(), array('params' => array(), 'class_suffix' => 'save', 'label' => 'Save',)) ?>
    <?php else: ?>
        <li class="sf_admin_action_cancel">
            <?php if (method_exists($helper, 'linkToCancel')): ?>
                <?php echo $helper->linkToCancel($form->getObject(), array('params' => array(), 'class_suffix' => 'cancel', 'label' => 'Cancel',)) ?>
            <?php else: ?>
                <?php echo link_to(__('Cancel', array(), 'messages'), 'student_contact/List_cancel?id=' . $student_contact->getId(), array()) ?>
            <?php endif; ?>
        </li>
        <?php echo $helper->linkToSave($form->getObject(), array('params' => array(), 'class_suffix' => 'save', 'label' => 'Save',)) ?>
        <li class="sf_admin_action_done">
            <?php if (method_exists($helper, 'linkToDone')): ?>
                <?php echo $helper->linkToDone($form->getObject(), array('params' => array(), 'class_suffix' => 'done', 'label' => 'Done',)) ?>
            <?php else: ?>
                <?php echo link_to(__('Done', array(), 'messages'), 'student_contact/List_done?id=' . $student_contact->getId(), array()) ?>
            <?php endif; ?>
        </li>
    <?php endif; ?>
</ul>
<script type='text/javascript'>
    $(document).ready(function(){       
        $("form .sf_admin_form_row").attr({"class": "contact_form_row"});
        $(".sf_admin_action_cancel a").click(function(){        
            $("#simplemodal-close").click();
            return false;
        });
        
        $(".sf_admin_action_save input").click(function(){ 
            $("#student_contact_form").ajaxSubmit(function(data){
                $("#modal-body").html(data);
            });            
            return false;
        });
        
        $(".sf_admin_action_done a").click(function(){        
            if($("#notice").val() == "undefined" || !isSuccess($("#notice").html())){
                $("#simplemodal-close").click();
                return false;
            }
            else{
                alert("Just testing...");
                window.location.href = "/student_contact";
                return false;
            }
        });
    });
    
    function isSuccess(value){  
        var regex = /successfully/;
        
        return regex.test(value);
    }
</script>
