<div id="cboxLoadedContentInner">
    <div class="choose-participants">
        <form id="message_choose_recipients_form" action="/backend.php/message_choose_recipients/<?php echo $type ?>" method="post">
            <ul class="nav-tabs" id="recipients-nav-tabs">
                <li id="student_recipients" class="active-tab"><a href="#">Students</a></li>
                <li id="instructor_recipients"><a href="#">Instructors</a></li>
                <li id="mailing_list_recipeints"><a href="#">Mailing Lists</a></li>
            </ul>
            <div class="peer-block plain-row padding-10">
                <div class="recipients_tab" id="student_recipients_tab">            
                    <?php foreach ($students as $student): ?>
                        <div class="peer">
                            <?php include_partial('personal_info/photo', array('user' => $student->getUser(), "dimension" => 36)) ?>
                            <div class="name"><?php echo link_to($student->getUser(), 'profile_show', $student->getUser()) ?></div>
                            <div class="message-recipient-input">
                                <input type="checkbox" class="input-checkbox" name="recipient[<?php echo $type ?>][student][]" value="<?php echo $student["id"] ?>" <?php echo (isset($recipient[$type]['student']) && is_array($recipient[$type]['student']) && in_array($student["id"], $recipient[$type]['student'])) ? "checked='checked'" : "" ?> id="recipient_student_<?php echo $student->getId() ?>" class="choose-input" />                
                            </div>
                        </div> 
                    <?php endforeach; ?>
                </div>
                <div class="recipients_tab hide" id="instructor_recipients_tab">
                    <?php foreach ($instructors as $instructor): ?>
                        <div class="peer">
                            <?php include_partial('personal_info/photo', array('user' => $instructor->getUser(), "dimension" => 36)) ?>
                            <div class="name"><?php echo link_to($instructor->getUser(), 'profile_show', $instructor->getUser()) ?></div>
                            <div class="message-recipient-input">
                                <input type="checkbox" class="input-checkbox" name="recipient[<?php echo $type ?>][instructor][]" value="<?php echo $instructor["id"] ?>" <?php echo (isset($recipient[$type]['instructor']) && is_array($recipient[$type]['instructor']) && in_array($instructor["id"], $recipient[$type]['instructor'])) ? "checked='checked'" : "" ?> id="recipient_student_<?php echo $instructor->getId() ?>" class="choose-input" />                
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="recipients_tab hide" id="mailing_list_recipeints_tab">
                    <?php foreach ($mailingLists as $mailingList): ?>
                        <div class="peer">
                            <?php include_partial('personal_info/photo', array('user' => $mailingList->getUser(), "dimension" => 36)) ?>
                            <div class="name"><?php echo $mailingList["name"] ?></div>
                            <div class="message-recipient-input">
                                <input type="checkbox" class="input-checkbox" name="recipient[<?php echo $type ?>][mailing_list][]" value="<?php echo $mailingList["id"] ?>" <?php echo (isset($recipient[$type]['mailing_list']) && is_array($recipient[$type]['mailing_list']) && in_array($mailingList["id"], $recipient[$type]['mailing_list'])) ? "checked='checked'" : "" ?> id="recipient_mailing_list_<?php echo $mailingList["id"] ?>" class="choose-input" />                
                            </div>
                        </div> 
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="clear"></div>
        </form>        
    </div>
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
        $("#recipients-nav-tabs a").click(function(){
            $("#recipients-nav-tabs li").removeClass("active-tab");
            $(this).parent().addClass("active-tab");
            $(".recipients_tab").addClass("hide");
            $("#" + $(this).parent().attr("id") + "_tab").removeClass('hide');
            
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