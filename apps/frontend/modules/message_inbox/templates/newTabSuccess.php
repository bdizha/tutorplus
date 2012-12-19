<?php use_helper('I18N', 'Date') ?>
<?php include_partial('message_inbox/flashes', array('form' => $form)) ?>
<?php include_partial('message_inbox/form', array('email_message' => $email_message, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
<script type="text/javascript">
    $(document).ready(function(){
        // set the counts of the email labels
        setListCounts();
        
        // enable the redactor editor
        $("#email_message_body").redactor();
        
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
                    $("#inbox_nav_tabs li").removeClass("active-tab");
                    $("#message_inbox_tab").addClass("active-tab");
                    fetchDefaultTab();
                    return false;
                }
                else{
                    return false;   
                }
            }
            
            if($("#email_message_to_email").val() == "")
            {  
                alert("Oops! You need to specify at least a recipient.");
                return false;
            }
            else if($("#email_message_body").val() == ""){
                alert("Oops! You can't send a blank email.");
                return false;
            }
            
            if($(this).val() != "Sending..."){
                $(this).val("Sending...");
                $("#message_form").ajaxSubmit(function(data){
                    if(data == "success")
                    {
                        $("#inbox_nav_tabs li").removeClass("active-tab");
                        $("#message_inbox_tab").addClass("active-tab");
                        fetchDefaultTab();
                    }
                    else
                    {
                        $("#email_container").html(data);
                    }
                });                
            }
        });
    });
</script>