<?php use_helper('I18N', 'Date') ?>
<div id="cboxLoadedContentInner">
    <div id="sf_admin_form_container">
        <div id="sf_admin_form_content">
            <?php include_partial('common/flashes_normal') ?>
            <form id="event_attendees_choose_form" action="/event/attendees/choose" method="post">
                <div class="choose-participants">
                    <?php foreach ($users as $user): ?>
                        <div class="recipient">
                            <div class="participant-input">
                                <input type="checkbox" class="input-checkbox" name="attendee[]" value="<?php echo $user->getId() ?>" <?php echo (isset($currentProfileIds) && is_array($currentProfileIds) && in_array($user["id"], $currentProfileIds)) ? "checked='checked'" : "" ?> id="attendee_<?php echo $user->getId() ?>" class="choose-input" />                
                            </div>
                            <?php include_partial('personal_info/photo', array('profile' => $user, "dimension" => 24)) ?>
                            <div class="name"><?php echo link_to($user, 'profile_show', $user) ?></div>
                        </div> 
                    <?php endforeach; ?>
                </div>
                <div class="clear"></div>
            </form>
        </div>
    </div>
</div>
<ul class="sf_admin_actions">
    <li class="sf_admin_action_cancel">
        <input class="cancel" type="button" value="Cancel"/>                                    
    </li>     
    <li class="sf_admin_action_done">
        <input class="done" type="button" value="Done"/>                                    
    </li>
    <li class="sf_admin_action_save_attendees">
        <input class="save" type="button" value="Save"/>                    
    </li>
</ul>
<script type='text/javascript'>
    $(document).ready(function(){
        $(".sf_admin_action_save_attendees input").click(function(){            
            $("#cboxLoadedContentInner").hide();
            $("#cboxLoadedContent").append(loadingHtml);
            
            $("#event_attendees_choose_form").ajaxSubmit(function(data){
                $("#cboxLoadedContent").html(data);
            });
        
            // fetch event attendees
            fetchEventAttendees();
            return false;
        });
        
        $(".cancel, .done").click(function(){
            $.fn.colorbox.close();
            return false;
        });
    });
</script>