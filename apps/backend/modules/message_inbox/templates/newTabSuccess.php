<?php use_helper('I18N', 'Date') ?>
<?php include_partial('message_inbox/flashes', array('form' => $form)) ?>
<?php include_partial('message_inbox/form', array('email_message' => $email_message, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
<input type="hidden" id="autocomplete_temporary_values" name="autocomplete_temporary[values]"></input>
<script type="text/javascript">
    $(document).ready(function(){      
        // set the counts of the email labels
        setListCounts();
        
        $("#email_message_to_email, #email_message_subject, #email_message_cc_email, #email_message_bcc_email").width($(".sf_admin_form_row").width() - 160);
        $("#email_message_body").width($(".sf_admin_form_row").width() - 10);
        $(".sf_admin_form_field_body label").remove();
        
        $('.save').click(function(){  
            if($(this).val() == "Send")
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
            }
            else if($(this).val() == "Cancel")
            {
                if (confirm("Are you sure you want to discard this message?")){
                    fetchDefaultTab();
                    $("li.tabs").removeClass("active");
                    $("#message_inbox_tab").addClass("active");
                    return false;
                }
                else{
                    return false;   
                }
            }
                
            $("#message_form").ajaxSubmit(function(data){
                if(data == "success")
                {
                    $("li.tabs").removeClass("active").addClass("normal");
                    $("#message_inbox_tab").addClass("active").removeClass("normal");
                    $("#tab_content").html(loadingHtml);
                    fetchDefaultTab();
                }
                else
                {
                    $("#tab_content").html(data);
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