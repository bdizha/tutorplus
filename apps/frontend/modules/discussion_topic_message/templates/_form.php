<div class="sf_admin_form">
    <div id="discussion_topic_message_form_holder">
        <?php echo form_tag_for($form, '@discussion_topic_message', array('id' => 'discussion_topic_message_form')) ?>
        <?php echo $form->renderHiddenFields(false) ?>
        <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_message">    
            <div class="content ">
                <div class="input"><?php echo $form["message"] ?></div>
            </div>
        </div>
        <div class="discussion_topic_actions">
            <input type="button" class="save" value="Send" />
        </div>
    </div>
</form>
</div>
<script type='text/javascript'>
    //<![CDATA[
    $(document).ready(function(){        
        $('#discussion_topic_message_message').redactor();
        $('#discussion_topic_message_form_holder .save').click(function(){    
            if($(this).val() != "Loading..." && $('#discussion_topic_message_message').val() != ""){
                $(this).val("Loading...");
                $("#discussion_topic_message_form").ajaxSubmit(function(data){                
                    if(data == "success"){                    
                        // the id parameter needn't be a valid one as we're using the sessioned one here
                        $.get('<?php echo url_for('@discussion_topic_message_show_mini') ?>', {}, function(messageData){   
                            $('#discussion-topic-replies').prepend(messageData);
                        }, 'html');                    
                    
                        // increment the messages count
                        var messagesCount = $('#messages-count').html();                    
                        messagesCount = parseInt(messagesCount) + 1;                    
                        $('#messages-count').html(messagesCount);
                        $("#discussion_topic_message_form_container").load('<?php echo url_for('@discussion_topic_message_new') ?>');            
                    }
                    else{
                        $("#discussion_topic_message_form_container").html(data);                    
                    }
                });                 
            }
        }); 
    });
    //]]>
</script>
