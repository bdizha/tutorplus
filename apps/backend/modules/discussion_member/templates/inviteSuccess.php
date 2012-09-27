<?php use_helper('I18N', 'Date') ?>
<div id="cboxLoadedContentInner">
    <div id="sf_admin_form_container">
        <div id="sf_admin_form_content">
            <?php include_partial('common/flashes') ?>
            <form id="discussion_member_invite_form" action="/backend.php/discussion_invite" method="post">
                <ul class="heading-tabs">
                    <li class="tabs active"><a id="student_members" href="#">Students</a></li>
                    <li class="tabs normal"><a id="instructor_members" href="#">Instructors</a></li>
                </ul>
                <div class="members_tab peer-block plain-row padding-10" id="student_members_tab">
                    <?php foreach ($students as $student): ?>
                        <div class="discussion-potential-member">
                            <div class="image">
                                <img alt="<?php echo $student["name"] ?>" src="/uploads/users/6/avatar_24.png"/>
                            </div>
                            <div class="name"><?php echo $student["name"] ?></div>
                            <div class="input">
                                <input type="checkbox" class="input-checkbox" name="members[student][]" value="<?php echo $student["user_id"] ?>" <?php echo (is_array($currentMemberIds) && in_array($student["user_id"], $currentMemberIds)) ? "checked='checked'" : "" ?> id="members_student_<?php echo $student["user_id"] ?>" class="choose-input" />                
                            </div>
                        </div> 
                    <?php endforeach; ?>
                </div>
                <div class="members_tab hide peer-block plain-row padding-10" id="instructor_members_tab">
                    <?php foreach ($instructors as $instructor): ?>
                        <div class="discussion-potential-member">
                            <div class="image">
                                <img alt="<?php echo $instructor["name"] ?>" src="/uploads/users/6/avatar_24.png"/>
                            </div>
                            <div class="name"><?php echo $instructor["name"] ?></div>
                            <div class="input">
                                <input type="checkbox" class="input-checkbox" name="members[instructor][]" value="<?php echo $instructor["user_id"] ?>" <?php echo (is_array($currentMemberIds) && in_array($instructor["user_id"], $currentMemberIds)) ? "checked='checked'" : "" ?> id="members_student_<?php echo $instructor["user_id"] ?>" class="choose-input" />                
                            </div>
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
    <li class="sf_admin_action_save">
        <input class="save invite" type="button" value="Invite"/>                    
    </li>
</ul>
<script type='text/javascript'>
    $(document).ready(function(){	
        $(".tabs a").click(function(){
            $("li.tabs").removeClass("active").addClass("normal");
            $(this).parent().addClass("active").removeClass("normal");            
            $(".members_tab").addClass("hide");
            $("#" + $(this).attr("id") + "_tab").removeClass('hide');
            $.fn.colorbox.resize();            
            return false;
        });
        
        $(".invite").click(function(){
            $("#cboxLoadedContentInner").hide();
            $("#cboxLoadedContent").append(loadingHtml);            
            $("#discussion_member_invite_form").ajaxSubmit(function(data){
                $("#cboxLoadedContent").html(data);
                $.fn.colorbox.resize();
                
                // check whether on the discussion page or discussion list page
                if($("#discussion_members").html() == undefined){ 
                    window.location = "/backend.php/discussion_member";
                }
                else{
                    // fetch discussion members
                    fetchDiscussionMembers();
                }
            });            
            return false;
        });
        
        $(".cancel, .done").click(function(){
            $.fn.colorbox.close();
            return false;
        });
    });
</script>