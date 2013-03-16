<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getLinks($course)) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->getBreadcrumbs("Course Peers", "course/peer")) ?>
<?php include_partial('tpCommon/flashes_normal') ?>
<div id="sf_admin_content">
    <div class="content-block">
        <?php include_partial('tpCommon/tabs', array('tabs' => $helper->getTabs("peers"))) ?>
        <div class="tab-block">
            <?php if (!$courseInstructorProfiles->count() && !$courseStudentProfiles->count()): ?>
                There isn't any course peers yet.
            <?php endif; ?>
            <?php include_partial('course_peer/list', array("profiles" => $courseInstructorProfiles)) ?>
            <?php include_partial('course_peer/list', array("profiles" => $courseStudentProfiles)) ?>
        </div>
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
