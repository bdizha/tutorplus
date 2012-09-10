<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_secondary', array("item_level_1" => "dashboard_course", "item_level_2" => "course_home", "Course Home", "current_route" => "course_participant")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Dashboard" => "dashboard", "My Courses" => "my_courses", "Course ~ "  . $course->getCode() => "course/" . $course->getId(), "Participants" => "course_participant"))) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3><?php echo __('Participants', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">  
    <div id="sf_admin_content">
        <div class="content-block">
            <ul class="sf_admin_actions" style="clear:both">
                <li class="sf_admin_action_list_discussion">
                    <input class="button" type="button" value="&lt; My Course" onclick="document.location.href='/backend.php/course/<?php echo $course->getId() ?>';return false">                            
                </li>
                <li class="sf_admin_action_manage_students">
                    <input type="button" class="button" value="Manage Students" />
                </li>
                <li class="sf_admin_action_manage_instructors">
                    <input type="button" class="button" value="Manage Instructors" />
                </li>
            </ul>
            <h2>Instructors + Teaching Assistants</h2>
            <div id="course_instructors"></div>
        </div>
        <div class="content-block">
            <h2>Students</h2>
            <div id="course_students"></div>
        </div>
        <ul class="sf_admin_actions" style="clear:both">
            <li class="sf_admin_action_list_discussion">
                <input class="button" type="button" value="&lt; My Course" onclick="document.location.href='/backend.php/course/<?php echo $course->getId() ?>';return false">                            
            </li>
            <li class="sf_admin_action_manage_students">
                <input type="button" class="button" value="Manage Students" />
            </li>
            <li class="sf_admin_action_manage_instructors">
                <input type="button" class="button" value="Manage Instructors" />
            </li>
        </ul>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        // fetch course instructors
        fetchCourseInstructors();
        
        // fetch course students
        fetchCourseStudents();        
        
        $(".sf_admin_action_manage_students input").click(function(){
            openPopup("/backend.php/choose_course_students", '633px', "480px", "<?php echo __('Course Students', Array(), 'messages') ?>");
            return false;
        }); 
        
        $(".sf_admin_action_manage_instructors input").click(function(){
            openPopup("/backend.php/choose_course_instructors", '633px', "480px", "<?php echo __('Course Instructors', Array(), 'messages') ?>");
            return false;
        });
    });

    function fetchCourseInstructors(){
        $('#course_instructors').html(loadingHtml);
        $.get('/backend.php/course_instructor', showCourseInstructors);
    }

    function showCourseInstructors(res){
        $('#course_instructors').html(res);
    }

    function fetchCourseStudents(){
        $('#course_students').html(loadingHtml);
        $.get('/backend.php/course_student', showCourseStudents);
    }

    function showCourseStudents(res){
        $('#course_students').html(res);
    }
</script>