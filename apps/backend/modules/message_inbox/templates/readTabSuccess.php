<?php use_helper('I18N', 'Date', 'Escaping') ?>
<div class="sf_admin_form">  
    <fieldset id="sf_fieldset_none">
        <?php include_partial("stream", array("email_message" => $email_message, "previous_sender_id" => $email_message->getSenderId(), "previous_id" => $email_message->getId(), 'isFirst' => true)) ?>
    </fieldset>
</div>
<script type='text/javascript'>
    $(document).ready(function(){        
        // set the counts of the email labels
        setListCounts();
        
        $('#message_read_tab a').html("<?php echo esc_specialchars($email_message->getSubject()) ?>");
        $('#message_read_tab a').attr("href", "message_read_tab/<?php echo $email_message->getId() ?>");
        
        $(".reply").click(function(){
            if($("#message_" + $(this).attr("id")).hasClass("hide")){
                $("#message_" + $(this).attr("id")).removeClass("hide");
                $("#sf_fieldset_none .body").addClass("hide");
                $("#sf_fieldset_none .body").removeClass("show");
            }
            else{
                $("#message_" + $(this).attr("id")).addClass("hide");
                $("#sf_fieldset_none .body").removeClass("hide");
                $("#sf_fieldset_none .body").addClass("show");
            }
            
            $("#email_message_body_" + $(this).attr("messageid")).focus();
            return false;
        });
    
        $('.save').click(function(){            
            var id_parts = $(this).attr("id").split("_");
            if(id_parts.length == 4)
            {
                if($(this).val() == "Send")
                {
                    var notice = "";
                    if($("#email_message_subject_" + id_parts[3]).val() == ""){
                        
                        notice = "Do you want to continue sending this message without a subject?"
                    }
                    else if($("#email_message_body_" + id_parts[3]).val() == ""){
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
                    $("#email_message_status_" + id_parts[3]).val("0");
                    $("#email_message_previous_id").val("<?php echo $email_message->getId() ?>");
                    
                }
                else if($(this).val() == "Cancel")
                {
                    if (confirm("Are you sure you want to discard this message?"))
                    {
                        $(".message_reply").addClass("hide");
                        return false;
                    }
                    else{
                        return false;   
                    }
                }
            }
            
            $("#message_form_" + id_parts[3]).ajaxSubmit(function(data){                
                $("#tab_content").html(loadingHtml);
                fetchDefaultTab();
                    
                $("li.tabs").removeClass("active").addClass("normal");
                $("#message_inbox_tab").addClass("active").removeClass("normal");
                
                if(data != "success")
                {
                    alert(data);
                }
            });
        });
        return false;
    });
    
    function setListCounts(){
        $("#message_inbox").html("Inbox (<?php echo $total_inbox_count ?>)");
        $("#message_draft").html("Drafts (<?php echo $total_drafts_count ?>)");
        $("#message_sent").html("Sent (<?php echo $total_sent_count ?>)");
        $("#message_trash").html("Trash (<?php echo $total_trash_count ?>)");
    }    
</script>