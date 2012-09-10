<div id="cboxLoadedContentInner">
    <form id="choose_course_instructors_form" action="/backend.php/choose_course_instructors" method="post">
        <div class="choose-participants">
            <?php foreach ($instructors as $instructor): ?>
                <div class="course-participant">
                    <div class="course-participant-image">
                        <img alt="<?php echo $instructor["name"] ?>" src="/uploads/users/6/avatar_24.png"/>
                    </div>
                    <div class="course-participant-name"><?php echo $instructor["name"] ?></div>
                    <div class="course-participant-input">
                        <input type="checkbox" class="input-checkbox" name="instructor[]" value="<?php echo $instructor["id"] ?>" <?php echo (isset($currentInstructorIds) && is_array($currentInstructorIds) && in_array($instructor["id"], $currentInstructorIds)) ? "checked='checked'" : "" ?> id="instructor_<?php echo $instructor["id"] ?>" class="choose-input" />                
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
    <li class="sf_admin_action_save_instructors">
        <input class="save" type="button" value="Save"/>                    
    </li>
</ul>
<script type='text/javascript'>
    $(document).ready(function(){
        $(".sf_admin_action_save_instructors input").click(function(){            
            $("#cboxLoadedContentInner").hide();
            $("#cboxLoadedContent").append(loadingHtml);
            
            $("#choose_course_instructors_form").ajaxSubmit(function(data){
                $("#cboxLoadedContent").html(data);
            });
            
            // fetch course instructors
            fetchCourseInstructors();
        
            return false;
        });
        
        $(".cancel, .done").click(function(){
            $.fn.colorbox.close();
            return false;
        });
    });
</script>