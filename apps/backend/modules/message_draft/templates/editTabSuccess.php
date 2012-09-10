<?php use_helper('I18N', 'Date') ?>
<?php include_partial('message_draft/flashes', array('form' => $form)) ?>
<?php include_partial('message_draft/form', array('email_message' => $email_message, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
<script type="text/javascript">
    $(document).ready(function(){      
        // set the counts of the email labels
        setListCounts();
        
        $('#message_edit_tab a').html("<?php echo $email_message->getSubject() ?>");
        $('#message_edit_tab a').attr("href", "message_draft_tab/<?php echo $email_message->getId() ?>/edit");
        
        $("#email_message_from_email").parent().append($("#email_message_from_email").val());        
        $("#email_message_from_email").hide();
        
        $(".sf_admin_form_field_body label").remove();
        $("div.sf_admin_form_field_to_email").append($("#cc_controller").html());
        $("div.sf_admin_form_field_cc_email").hide();
        $("div.sf_admin_form_field_bcc_email").hide();
        
        $("#add_cc").click(function(){
            $("div.sf_admin_form_field_cc_email").toggle();
        });

        $("#add_bcc").click(function(){
            $("div.sf_admin_form_field_bcc_email").toggle();
        });
    });
    
    function setListCounts(){
        $("#message_inbox").html("Inbox (<?php echo $total_inbox_count ?>)");
        $("#message_draft").html("Drafts (<?php echo $total_drafts_count ?>)");
        $("#message_sent").html("Sent (<?php echo $total_sent_count ?>)");
        $("#message_trash").html("Trash (<?php echo $total_trash_count ?>)");
    }
</script>