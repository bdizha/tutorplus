<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="sf_admin_form">
    <div id="<?php echo $this->getModuleName() ?>_form_holder">
        <?php echo form_tag_for($form, '@discussion_topic_message', array('id' => 'discussion_topic_message_form')) ?>
        <?php echo $form->renderHiddenFields(false) ?>
        <?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?>
            <?php include_partial('discussion_topic_message/form_fieldset', array('discussion_topic_message' => $discussion_topic_message, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?>
        <?php endforeach; ?>
        <div class="discussion_topic_actions">
            <input type="button" class="save" href="/backend.php/discussion_topic/8" value="Send" />
        </div>
    </div>
</form>
</div>
<script type='text/javascript'>
    //<![CDATA[
    $(document).ready(function(){    
        $('textarea').elastic().trigger('update');
        
        $('#discussion_topic_message_form_holder .save').click(function(){            
            $("#discussion_topic_message_form").hide();
            $("#discussion_topic_message_form_holder").append(loadingHtml);
		
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
        }); 
    });
    //]]>
</script>
