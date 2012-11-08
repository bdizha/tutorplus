<div id="sf_admin_form_container"> 
    <?php include_partial('common/flashes', array('form' => $form)) ?>
    <form id="course_form" action="/backend_dev.php/courses_student" method="post">
        <div id="sf_admin_container">
            <div class="student_form_row">    
                <div>
                    <?php echo $form["faculty_id"]->renderLabel() ?>
                    <div class="content ">
                        <?php echo $form["faculty_id"]->render() ?>      
                    </div>
                </div>
            </div>
            <div class="student_form_row">    
                <div>
                    <?php echo $form["faculty_id"]->renderLabel() ?>
                    <div class="content ">
                        <?php echo $form["department_id"]->render() ?>      
                    </div>
                </div>
            </div>        
        </div>
        <div class="content-block">
            <div id="choose_courses">
                <ul>
                    <?php foreach ($courses_list as $course): ?>
                        <li>
                            <div class="program-image">
                                <img src="/images/icons/14x14/my_courses.png" alt="<?php echo $course["name"] ?>">
                            </div>
                            <div class="program-name">
                                <?php echo $course["name"] ?>
                            </div>
                            <input type="hidden" name="courses_list_names[]" value="<?php echo $course["name"] ?>" id="courses_list_names_<?php echo $course["name"] ?>"/>
                            <input type="checkbox" name="courses_list_ids[]" value="<?php echo $course["id"] ?>" <?php echo (in_array($course["id"], $current_courses_keys)) ? "checked='checked'" : "" ?> id="courses_list_ids_<?php echo $course["id"] ?>" class="choose-input" />
                        </li> 
                    <?php endforeach; ?>
                </ul>
                <div class="clear"></div>
            </div>        
        </div>
        <ul class="sf_admin_actions">
            <li class="sf_admin_action_cancel">
                <a href="/contact_student/1/List_cancel">Cancel</a>                    
            </li>
            <li class="sf_admin_action_save">
                <input type="button" class="save" value=" Save ">
            </li>       
            <li class="sf_admin_action_done">
                <a href="/contact_student/1/List_done">Done</a>                   
            </li>
        </ul>
    </form>
</div>
<script type='text/javascript'>
    $(document).ready(function(){	        
        $("#department_faculty_id").change(function(){
            var faculty = $("#department_faculty_id").val();
            var data = {f:faculty};
            
            if(data != null)
            {
                $.getJSON("/department_choose", data, reloadDepartments);                    
            }
        });
        
        $("#department_department_id").change(function(){
            var department = $("#department_department_id").val();
            var data = {d:department};
            
            if(data != null)
            {
                $.get("/backend_dev.php/course_choose", data, reloadCourses);                    
            }
        });
        
        function reloadDepartments(data)
        {
            $("#department_department_id").html("");
            for(var i = 0; i < data.length; i++){
                $("#department_department_id").append("<option value=\"" + data[i].id + "\">" + data[i].name + "</option>");
            }
        }
        
        function reloadCourses(data)
        {
            $("#choose_courses").html(data);
        }
        
        $(".sf_admin_action_cancel a").click(function(){        
            $("#simplemodal-close").click();
            return false;
        });
        
        $(".sf_admin_action_save input").click(function(){ 
            $("#course_form").ajaxSubmit(function(data){
                $("#modal-body").html(data);
                
                // load the programmes list
                $("#courses_list").load("student_courses");
            });            
            return false;
        });
        
        $(".sf_admin_action_done a").click(function(){        
            $("#simplemodal-close").click();
            return false;
        });
    });
</script>