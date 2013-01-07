<div id="cboxLoadedContentInner">
    <form id="choose_course_instructors_form" action="<?php echo url_for("@choose_course_instructors") ?>" method="post">
        <?php if (!$instructors->count()): ?>
            There's no instructors to manage currently.
        <?php else: ?>
            <?php foreach ($instructors as $instructor): ?>
                <div class="course-follower">
                    <?php include_partial('personal_info/photo', array('profile' => $instructor->getProfile(), "dimension" => 36)) ?>
                    <div class="name"><?php echo $instructor->getProfile() ?></div>
                    <div class="input">
                        <input type="checkbox" class="input-checkbox" name="instructor[]" value="<?php echo $instructor->getId() ?>" <?php echo (isset($currentInstructorIds) && is_array($currentInstructorIds) && in_array($instructor["id"], $currentInstructorIds)) ? "checked='checked'" : "" ?> id="instructor_<?php echo $instructor->getId() ?>" class="choose-input" />
                    </div>
                </div> 
            <?php endforeach; ?>
        <?php endif; ?>
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