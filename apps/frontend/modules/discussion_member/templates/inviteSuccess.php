<?php use_helper('I18N', 'Date') ?>
<div id="cboxLoadedContentInner">
    <div id="sf_admin_form_container">
        <div id="sf_admin_form_content">
            <form id="discussion_member_invite_form" action="/discussion/member/invite" method="post">
                <div class="follower-filters">
                    <ul class="nav-tabs">
                        <li class="active-tab">
                            <a href="#" tab="student_followers" class="tab-title">Students</a>
                        </li>
                        <li>
                            <a href="#" tab="instructor_followers" class="tab-title">Instructors</a>
                        </li>
                    </ul>
                </div>
                <div class="followers_tab padding-10" id="student_followers">
                    <?php if (!$students->count()): ?>
                        <div class="no-result">There's no students to invite currently.</div>
                    <?php else: ?>
                        <?php foreach ($students as $student): ?>
                            <div class="discussion-potential-member">
                                <div class="image">
                                    <?php include_partial('personal_info/photo', array('profile' => $student->getProfile(), "dimension" => 24)) ?>
                                </div>
                                <div class="name"><?php echo $student["name"] ?></div>
                                <div class="input">
                                    <input type="checkbox" class="input-checkbox" name="members[student][]" value="<?php echo $student["profile_id"] ?>" <?php echo (is_array($currentMemberIds) && in_array($student["profile_id"], $currentMemberIds)) ? "checked='checked'" : "" ?> id="members_student_<?php echo $student["profile_id"] ?>" class="choose-input" />                
                                </div>
                            </div> 
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="followers_tab hide padding-10" id="instructor_followers">
                    <?php if (!$instructors->count()): ?>
                        <div class="no-result">There's no instructors to invite currently.</div>
                    <?php else: ?>
                        <?php foreach ($instructors as $instructor): ?>
                            <div class="discussion-potential-member">
                                <div class="image">
                                    <?php include_partial('personal_info/photo', array('profile' => $instructor->getProfile(), "dimension" => 24)) ?>
                                </div>
                                <div class="name"><?php echo $instructor["name"] ?></div>
                                <div class="input">
                                    <input type="checkbox" class="input-checkbox" name="members[instructor][]" value="<?php echo $instructor["profile_id"] ?>" <?php echo (is_array($currentMemberIds) && in_array($instructor["profile_id"], $currentMemberIds)) ? "checked='checked'" : "" ?> id="members_student_<?php echo $instructor["profile_id"] ?>" class="choose-input" />                
                                </div>
                            </div> 
                        <?php endforeach; ?>
                    <?php endif; ?>
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
    <li class="sf_admin_action_invite">
        <input class="save" type="button" value="Invite"/>                    
    </li>
</ul>
<script type='text/javascript'>
    $(document).ready(function(){	
        $(".nav-tabs a").click(function(){
            $(".nav-tabs li").removeClass("active-tab");
            $(this).parent().addClass("active-tab");
            
            $(".followers_tab").addClass("hide");
            $("#" + $(this).attr("tab")).removeClass("hide");
        });
        
        $(".sf_admin_action_invite .save").click(function(){
            $("#cboxLoadedContentInner").hide();
            $("#cboxLoadedContent").append(loadingHtml);            
            $("#discussion_member_invite_form").ajaxSubmit(function(data){
                $("#cboxLoadedContent").html(data);
                $.fn.colorbox.resize();
                $("#discussion-notice").html("Follower invitations have been sent successfully!");
                $(".notice").hide();
                $("#discussion-notice").show();
                 setTimeout(function(){
                    $(".notice").hide();
                },10000);
                 $("#discussion-followers").load("/discussion/member/followers");
            });            
            return false;
        });
        
        $(".cancel, .done").click(function(){
            // reload the current page
            $.fn.colorbox.close();
            return false;
        });
    });
</script>