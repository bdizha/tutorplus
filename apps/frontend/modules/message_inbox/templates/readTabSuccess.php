<?php use_helper('I18N', 'Date', 'Escaping') ?>
<div class="sf_admin_form">  
    <fieldset id="sf_fieldset_none">
        <?php include_partial("stream", array("emailMessage" => $emailMessage, "fromEmail" => $fromEmail, "previous_sender_id" => $emailMessage->getSenderId(), "previous_id" => $emailMessage->getId(), 'isFirst' => true)) ?>
    </fieldset>
</div>
<script type='text/javascript'>
    $(document).ready(function(){
        // make the reply textarea elastic	
        $('textarea').redactor();
        
        // set the counts of the email labels
        setListCounts();
        
        $('#message_read_tab a').html("<?php echo esc_specialchars($emailMessage->getSubject()) ?>");
        $('#message_read_tab a').attr("href", "message/read/tab/<?php echo $emailMessage->getId() ?>");
        
        $('.save').click(function(){
            var body = $("#email_message_reply_body").val();
            if($.trim(body) != ""){
                $("#message_reply_form").ajaxSubmit(function(data){
                    if(data == "success")
                    {            
                        $("#sent_nav_tabs li").removeClass("active-tab");
                        $("#message_read_tab").addClass("active-tab")
                        $("#email_container").html(loadingHtml);
                        $("#email_container").load("/message/read/tab/<?php echo $emailMessage->getId() ?>");
                    }
                    else
                    {
                        $("#email_container").html(data);
                    }
                });
            }
            else{
                alert("Oops! You need to specify a message.");
            }
        });
    });
    
    function setListCounts(){
        $("#message_inbox_item a").html("Inbox (<?php echo $totalInboxCount ?>)");
        $("#message_draft_item a").html("Drafts (<?php echo $totalDraftsCount ?>)");
        $("#message_sent_item a").html("Sent (<?php echo $totalSentCount ?>)");
        $("#message_trash_item a").html("Trash (<?php echo $totalTrashCount ?>)");
    }    
</script>