<div id="sf_admin_form_container">
    <form id="mailing_list_form" action="/mailing_lists_student" method="post">
        <div class="content-block">
            <div id="choose_mailing_lists">
                <ul>
                    <?php foreach ($mailing_lists_list as $mailing_list): ?>
                        <li>
                            <div class="program-image">
                                <img alt="<?php echo $mailing_list["name"] ?>" src="/images/icons/14x14/mailing_lists.png"></img>
                            </div>
                            <div class="program-name">
                                <?php echo $mailing_list["name"] ?>
                            </div>
                            <input type="hidden" name="mailing_lists_list_names[]" value="<?php echo $mailing_list["name"] ?>" id="mailing_lists_list_names_<?php echo $mailing_list["name"] ?>"/>
                            <input type="checkbox" name="mailing_lists_list_ids[]" value="<?php echo $mailing_list["id"] ?>" <?php echo (in_array($mailing_list["id"], $current_mailing_lists_keys)) ? "checked='checked'" : "" ?> id="mailing_lists_list_ids_<?php echo $mailing_list["id"] ?>" class="choose-input" />
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
                $.get("/course_choose", data, reloadCourses);                    
            }
        });
        
        function reloadDepartments(data)
        {
            $("#department_department_id").html("");
            for(var i = 0; i < data.length; i++){
                $("#department_department_id").append("<option value=\"" + data[i].id + "\">" + data[i].name + "</option>");
            }
        }
        
        function reloadMailingLists(data)
        {
            $("#choose_mailing_lists").html(data);
        }
        
        $(".sf_admin_action_cancel a").click(function(){        
            $("#simplemodal-close").click();
            return false;
        });
        
        $(".sf_admin_action_save input").click(function(){ 
            $("#mailing_list_form").ajaxSubmit(function(data){
                $("#modal-body").html(data);
                
                // load the mailing lists list
                $("#mailing_lists_list").load("student_mailing_lists");
            });            
            return false;
        });
        
        $(".sf_admin_action_done a").click(function(){        
            $("#simplemodal-close").click();
            return false;
        });
    });
</script>