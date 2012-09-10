<ul class="sf_admin_actions">
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
</ul>
<script type='text/javascript'>
    $(document).ready(function(){	  
        $('.save').click(function(){
            var id_parts = $(this).attr("id").split("_");            
            if(id_parts.length == 3)
            {
                if($("#email_message_to_email").val() != "" && $("#email_message_subject").val() != ""){
                    var notice = "";
                    if($("#email_message_body").val() == ""){
                        notice = "Do you want to continue sending this message without a body?"
                    }
                
                    if(notice != "")
                    {
                        if (!confirm(notice))
                        {
                            return false;
                        }                     
                    }
                    // set the message status to "sent"
                    $("#email_message_status").val("0");
                }
                else if($(this).val() == "Cancel")
                {
                    if (confirm("Are you sure you want to discard this message?")){
                        fetchDefaultTab();
                        $("li.tabs").removeClass("active");
                        $("#message_draft_tab").addClass("active");
                        return false;
                    }
                    else{
                        return false;   
                    }
                }
            }
                
            $("#message_form_" + id_parts[2]).ajaxSubmit(function(data){
                if(data == "success")
                {
                    fetchDefaultTab();
                    $("li.tabs").removeClass("active");
                    $("#message_draft_tab").addClass("active");
                }
                else
                {
                    $("#tab_content").html(data);
                }
            });
        });
    });
</script>