<div id="cboxLoadedContentInner">
    <form id="message_choose_recipients_form" action="/backend.php/message_choose_recipients/<?php echo $type ?>" method="post">
        <ul class="heading-tabs">
            <li class="tabs active"><a id="student_recipients" href="#">Students</a></li>
            <li class="tabs normal"><a id="instructor_recipients" href="#">Instructors</a></li>
            <li class="tabs normal"><a id="mailing_list_recipeints" href="#">Mailing Lists</a></li>
        </ul>
        <div class="recipients_tab" id="student_recipients_tab">
            <?php foreach ($students as $student): ?>
                <div class="message-recipient">
                    <div class="message-recipient-image">
                        <img alt="<?php echo $student["name"] ?>" src="/uploads/users/6/avatar_24.png"/>
                    </div>
                    <div class="message-recipient-name"><?php echo $student["name"] ?></div>
                    <div class="message-recipient-input">
                        <input type="checkbox" class="input-checkbox" name="recipient[<?php echo $type ?>][student][]" value="<?php echo $student["id"] ?>" <?php echo (isset($recipient[$type]['student']) && is_array($recipient[$type]['student']) && in_array($student["id"], $recipient[$type]['student'])) ? "checked='checked'" : "" ?> id="recipient_student_<?php echo $student["id"] ?>" class="choose-input" />                
                    </div>
                </div> 
            <?php endforeach; ?>
        </div>
        <div class="recipients_tab hide" id="instructor_recipients_tab">
            <?php foreach ($instructors as $instructor): ?>
                <div class="message-recipient">
                    <div class="message-recipient-image">
                        <img alt="<?php echo $instructor["name"] ?>" src="/uploads/users/6/avatar_24.png"/>
                    </div>
                    <div class="message-recipient-name"><?php echo $instructor["name"] ?></div>
                    <div class="message-recipient-input">
                        <input type="checkbox" class="input-checkbox" name="recipient[<?php echo $type ?>][instructor][]" value="<?php echo $instructor["id"] ?>" <?php echo (isset($recipient[$type]['instructor']) && is_array($recipient[$type]['instructor']) && in_array($instructor["id"], $recipient[$type]['instructor'])) ? "checked='checked'" : "" ?> id="recipient_student_<?php echo $instructor["id"] ?>" class="choose-input" />                
                    </div>
                </div> 
            <?php endforeach; ?>
        </div>
        <div class="recipients_tab hide" id="mailing_list_recipeints_tab">
            <?php foreach ($mailingLists as $mailingList): ?>
                <div class="message-recipient">
                    <div class="message-recipient-image">
                        <img alt="<?php echo $mailingList["name"] ?>" src="/uploads/users/6/avatar_24.png"/>
                    </div>
                    <div class="message-recipient-name"><?php echo $mailingList["name"] ?></div>
                    <div class="message-recipient-input">
                        <input type="checkbox" class="input-checkbox" name="recipient[<?php echo $type ?>][mailing_list][]" value="<?php echo $mailingList["id"] ?>" <?php echo (isset($recipient[$type]['mailing_list']) && is_array($recipient[$type]['mailing_list']) && in_array($mailingList["id"], $recipient[$type]['mailing_list'])) ? "checked='checked'" : "" ?> id="recipient_mailing_list_<?php echo $mailingList["id"] ?>" class="choose-input" />                
                    </div>
                </div> 
            <?php endforeach; ?>
        </div>
        <div class="clear"></div>
    </form>
</div>
<ul class="sf_admin_actions">
    <li class="sf_admin_action_cancel">
        <input class="cancel" type="button" value="Cancel"/>                                    
    </li>     
    <li class="sf_admin_action_done">
        <input class="done" type="button" value="Done"/>                                    
    </li>
    <li class="sf_admin_action_add_recipients">
        <input class="save" type="button" value="Add Recipients"/>                    
    </li>
</ul>
<div id="recipients-holder" class="hide">
    <?php include_partial('email_recipients', array('type' => $type, 'students' => $students, 'instructors' => $instructors, 'mailingLists' => $mailingLists)) ?>
</div>
<script type='text/javascript'>
    $(document).ready(function(){	
        $(".tabs a").click(function(){
            $("li.tabs").removeClass("active").addClass("normal");
            $(this).parent().addClass("active").removeClass("normal");
            
            $(".recipients_tab").addClass("hide");
            $("#" + $(this).attr("id") + "_tab").removeClass('hide');
            
            $.fn.colorbox.resize();            
            return false;
        });
        
        // push the newly added recipients to the message
        $("#<?php echo $type ?>_recipients").html($("#recipients-holder").html());
        
        $(".sf_admin_action_add_recipients input").click(function(){            
            $("#cboxLoadedContentInner").hide();
            $("#cboxLoadedContent").append(loadingHtml);
            
            $("#message_choose_recipients_form").ajaxSubmit(function(data){
                $("#cboxLoadedContent").html(data);
            });            
            return false;
        });
        
        $(".cancel, .done").click(function(){
            $.fn.colorbox.close();
            return false;
        });
    });
</script>