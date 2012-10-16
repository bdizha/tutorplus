<div id="cboxLoadedContentInner">
    <form id="choose_course_students_form" action="/backend.php/choose_course_students" method="post">
        <div class="choose-participants">
            <?php foreach ($students as $student): ?>
                <div class="peer">
                    <?php include_partial('personal_info/photo', array('user' => $student->getUser(), "dimension" => 36)) ?>
                    <div class="name"><?php echo link_to($student->getUser(), 'profile_show', $student->getUser()) ?></div>
                    <div class="course-participant-input">
                        <input type="checkbox" class="input-checkbox" name="student[]" value="<?php echo $student->getId() ?>" <?php echo (isset($currentStudentIds) && is_array($currentStudentIds) && in_array($student["id"], $currentStudentIds)) ? "checked='checked'" : "" ?> id="student_<?php echo $student->getId() ?>" class="choose-input" />                
                    </div>
                </div> 
            <?php endforeach; ?>
            <?php foreach ($students as $student): ?>
                <div class="peer">
                    <?php include_partial('personal_info/photo', array('user' => $student->getUser(), "dimension" => 36)) ?>
                    <div class="name"><?php echo link_to($student->getUser(), 'profile_show', $student->getUser()) ?></div>
                    <div class="course-participant-input">
                        <input type="checkbox" class="input-checkbox" name="student[]" value="<?php echo $student->getId() ?>" <?php echo (isset($currentStudentIds) && is_array($currentStudentIds) && in_array($student["id"], $currentStudentIds)) ? "checked='checked'" : "" ?> id="student_<?php echo $student->getId() ?>" class="choose-input" />                
                    </div>
                </div> 
            <?php endforeach; ?>
            <?php foreach ($students as $student): ?>
                <div class="peer">
                    <?php include_partial('personal_info/photo', array('user' => $student->getUser(), "dimension" => 36)) ?>
                    <div class="name"><?php echo link_to($student->getUser(), 'profile_show', $student->getUser()) ?></div>
                    <div class="course-participant-input">
                        <input type="checkbox" class="input-checkbox" name="student[]" value="<?php echo $student->getId() ?>" <?php echo (isset($currentStudentIds) && is_array($currentStudentIds) && in_array($student["id"], $currentStudentIds)) ? "checked='checked'" : "" ?> id="student_<?php echo $student->getId() ?>" class="choose-input" />                
                    </div>
                </div> 
            <?php endforeach; ?>
            <?php foreach ($students as $student): ?>
                <div class="peer">
                    <?php include_partial('personal_info/photo', array('user' => $student->getUser(), "dimension" => 36)) ?>
                    <div class="name"><?php echo link_to($student->getUser(), 'profile_show', $student->getUser()) ?></div>
                    <div class="course-participant-input">
                        <input type="checkbox" class="input-checkbox" name="student[]" value="<?php echo $student->getId() ?>" <?php echo (isset($currentStudentIds) && is_array($currentStudentIds) && in_array($student["id"], $currentStudentIds)) ? "checked='checked'" : "" ?> id="student_<?php echo $student->getId() ?>" class="choose-input" />                
                    </div>
                </div> 
            <?php endforeach; ?>
            <?php foreach ($students as $student): ?>
                <div class="peer">
                    <?php include_partial('personal_info/photo', array('user' => $student->getUser(), "dimension" => 36)) ?>
                    <div class="name"><?php echo link_to($student->getUser(), 'profile_show', $student->getUser()) ?></div>
                    <div class="course-participant-input">
                        <input type="checkbox" class="input-checkbox" name="student[]" value="<?php echo $student->getId() ?>" <?php echo (isset($currentStudentIds) && is_array($currentStudentIds) && in_array($student["id"], $currentStudentIds)) ? "checked='checked'" : "" ?> id="student_<?php echo $student->getId() ?>" class="choose-input" />                
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
    <li class="sf_admin_action_save_students">
        <input class="save" type="button" value="Save"/>                    
    </li>
</ul>
<script type='text/javascript'>
    $(document).ready(function(){
        $(".sf_admin_action_save_students input").click(function(){            
            $("#cboxLoadedContentInner").hide();
            $("#cboxLoadedContent").append(loadingHtml);
            
            $("#choose_course_students_form").ajaxSubmit(function(data){
                $("#cboxLoadedContent").html(data);
            });
        
            // fetch course students
            fetchCourseStudents();
            
            return false;
        });
        
        $(".cancel, .done").click(function(){
            $.fn.colorbox.close();
            return false;
        });
    });
</script>