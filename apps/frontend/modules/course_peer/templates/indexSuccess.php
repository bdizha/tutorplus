<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->indexLinks($course)) ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs($course)) ?>
<div class="sf_admin_heading">
    <h3><?php echo __('%%code%% ~ %%name%%', array('%%code%%' => $course->getCode(), '%%name%%' => $course->getName()), 'messages') ?></h3>
</div>
<div id="sf_admin_content">
    <?php include_partial('common/flashes_normal') ?>
    <div class="content-block">
        <?php include_partial('common/tabs', array('tabs' => $helper->getIndexTabs($course))) ?>
        <div class="tab-block">
            <div id="course_instructors">
                <?php include_partial('course_peer/list', array("profiles" => $courseInstructorProfiles)) ?>           
            </div>
        </div>
        <?php //include_partial('common/actions', array('actions' => array("manage_instructors" => array("title" => "Manage Instructors"), "manage_students" => array("title" => "Manage Students")))) ?>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".sf_admin_action_manage_students input").click(function(){
            openPopup("/choose/course/students",'420px','480px',"<?php echo __('Manage Course Students', Array(), 'messages') ?>");
            return false;
        });
        $(".sf_admin_action_manage_instructors input").click(function(){
            openPopup("/choose/course/instructors",'420px','480px',"<?php echo __('Manage Course Instructors', Array(), 'messages') ?>");
            return false;
        });
    });

    function fetchCourseStudents(){
        $('#course_students').html(loadingHtml);
        $.get('/course/student',showCourseStudents);
    }

    function showCourseStudents(res){
        $('#course_students').html(res);
    }

    function fetchCourseInstructors(){
        $('#course_instructors').html(loadingHtml);
        $.get('/course/instructor',showCourseInstructors);
    }

    function showCourseInstructors(res){
        $('#course_instructors').html(res);
    }
</script>