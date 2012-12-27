<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->participantsLinks($course)) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->participantsBreadcrumbs($course)) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3><?php echo __('Course Peers', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">  
    <div id="sf_admin_content">
        <div class="content-block">
            <h2></h2>
            <div id="course_students">
                <?php include_partial('course_participant/students', array('course' => $course)) ?>
            </div>
        </div>
        <?php include_partial('common/actions', array('actions' => array("manage_students" => array("title" => "Manage Students")))) ?>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".sf_admin_action_manage_students input").click(function(){
            openPopup("/choose/course/students", '583px', '480px', "<?php echo __('Manage Student Followers', Array(), 'messages') ?>");
            return false;
        });
    });
    
    function fetchCourseStudents(){
        $('#course_students').html(loadingHtml);
        $.get('/course/student', showCourseStudents);
    }

    function showCourseStudents(res){
        $('#course_students').html(res);
    }
</script>