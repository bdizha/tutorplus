<?php use_helper('I18N', 'Date') ?>
<div id="cboxLoadedContentInner">
    <div id="sf_admin_form_container">
        <div id="sf_admin_form_content">
            <?php include_partial('common/flashes') ?>
            <form id="<?php echo $module ?>_choose_course_form" action="<?php echo url_for2('choose_course', array("module_name" => $module, "object_id" => $objectId)) ?>" method="post">
                <?php foreach ($courses as $key => $course): ?>
                    <div class="student-course">
                        <img alt="<?php echo $course["name"] ?>" src="/images/course-icon.png" style="width: 36px;height: 36px;">                  
                        <div class="name"><?php echo $course["name"] ?></div>
                        <div class="input">
                            <input type="checkbox" name="courses[]" value="<?php echo $course["id"] ?>" <?php echo (in_array($course["id"], $currentCourseIds)) ? "checked='checked'" : "" ?> id="course_<?php echo $course["id"] ?>" class="choose-input" />
                        </div>
                    </div>
                <?php endforeach; ?>
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
        <input class="save add-course" type="button" value="Save"/>                    
    </li>
</ul>
<script type='text/javascript'>
    $(document).ready(function(){	
        $(".add-course").click(function(){
            $("#cboxLoadedContentInner").hide();
            $("#cboxLoadedContent").append(loadingHtml);            
            $("#<?php echo $module ?>_choose_course_form").ajaxSubmit(function(data){
                $("#cboxLoadedContent").html(data);
                
                // fetch the module courses
                fetchCourses();
                
                $.fn.colorbox.resize();
            });            
            return false;
        });
        
        $(".cancel, .done").click(function(){
            $.fn.colorbox.close();
            return false;
        });
    });
</script>