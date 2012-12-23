<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->participantsLinks($course)) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->participantsBreadcrumbs($course)) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3><?php echo __('Course Followers', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">  
    <div id="sf_admin_content">
        <div class="content-block">
            <h2>Instructors + Teaching Assistants</h2>
            <div id="course_instructors"></div>
        </div>
        <div class="content-block">
            <h2>Students</h2>
            <div id="course_students"></div>
        </div>
        <?php include_partial('common/content_actions', array('actions' => $helper->participantsContentActions($course))) ?>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        // fetch course instructors
        fetchCourseInstructors();
        
        // fetch course students
        fetchCourseStudents();        
        
        $(".sf_admin_action_manage_students input").click(function(){
            openPopup("/choose/course/students", '583px', '480px', "<?php echo __('Manage Student Followers', Array(), 'messages') ?>");
            return false;
        }); 
        
        $(".sf_admin_action_manage_instructors input").click(function(){
            openPopup("/choose/course/instructors", '583px', '480px', "<?php echo __('Manage Instructor Followers', Array(), 'messages') ?>");
            return false;
        });
    });

    function fetchCourseInstructors(){
        $('#course_instructors').html(loadingHtml);
        $.get('/course/instructor', showCourseInstructors);
    }

    function showCourseInstructors(res){
        $('#course_instructors').html(res);
    }

    function fetchCourseStudents(){
        $('#course_students').html(loadingHtml);
        $.get('/course/student', showCourseStudents);
    }

    function showCourseStudents(res){
        $('#course_students').html(res);
    }
</script>