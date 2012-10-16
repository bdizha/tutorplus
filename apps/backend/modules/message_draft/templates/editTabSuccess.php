<?php use_helper('I18N', 'Date') ?>
<?php include_partial('message_draft/flashes', array('form' => $form)) ?>
<?php include_partial('message_draft/form', array('email_message' => $email_message, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
<script type="text/javascript">
    $(document).ready(function(){
        
        // make the reply textarea elastic
        $('textarea').elastic().trigger('update');
        
        $('textarea').blur(function(){
            $('body').click();
        });
        
        // set the counts of the email labels
        setListCounts();
        
        $(".sf_admin_form_field_body label").remove();        
        $('.email').click(function(){  
            if($(this).val() == "Save Draft")
            {  
                // set the message status to "saved"
                $("#email_message_status").val("<?php echo EmailMessageTable::EMAIL_MESSAGE_STATUS_SAVED ?>");
            }
            else if($(this).val() == "Cancel")
            {
                if (confirm("Are you sure you want to discard this message?")){
                    $("#drafts_nav_tabs li").removeClass("active-tab");
                    $("#message_draft_tab").addClass("active-tab");
                    fetchDefaultTab();
                    return false;
                }
                else{
                    return false;   
                }
            }
            else{
                $("#email_message_status").val("<?php echo EmailMessageTable::EMAIL_MESSAGE_STATUS_SENT ?>");
            }
                
            $("#message_form").ajaxSubmit(function(data){
                if(data == "success")
                {
                    $("#drafts_nav_tabs li").removeClass("active-tab");
                    $("#message_draft_tab").addClass("active-tab");
                    fetchDefaultTab();
                }
                else
                {
                    $("#email_container").html(data);
                }
            });
        });
    });
    
    function setListCounts(){
        $("#message_inbox").html("Inbox (<?php echo $total_inbox_count ?>)");
        $("#message_draft").html("Drafts (<?php echo $total_drafts_count ?>)");
        $("#message_sent").html("Sent (<?php echo $total_sent_count ?>)");
        $("#message_trash").html("Trash (<?php echo $total_trash_count ?>)");
    }
</script>