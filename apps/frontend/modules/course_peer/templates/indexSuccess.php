<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->indexLinks($course)) ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs($course)) ?>
<div class="sf_admin_heading">
  <h3><?php echo __('Course Peers', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_container">
  <div id="sf_admin_content">
    <div class="content-block">
      <h4>Course Instructors</h4>
      <div class="full-block">
        <div id="course_instructors">
          <?php include_partial('peer/list', array("peers" => $courseInstructorPeers)) ?>            
        </div>
      </div>
      <?php include_partial('common/actions', array('actions' => array("manage_instructors" => array("title" => "Manage Instructors"), "manage_students" => array("title" => "Manage Students")))) ?>
    </div>
    <div class="content-block">
      <h4>Course Students</h4>
      <div class="full-block">
        <div id="course_students">
          <?php include_partial('peer/list', array("peers" => $courseStudentPeers)) ?>          
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $(".sf_admin_action_manage_students input").click(function(){
      openPopup("/choose/course/students",'513px','480px',"<?php echo __('Manage Course Students', Array(), 'messages') ?>");
      return false;
    });
    $(".sf_admin_action_manage_instructors input").click(function(){
      openPopup("/choose/course/instructors",'513px','480px',"<?php echo __('Manage Course Instructors', Array(), 'messages') ?>");
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

  function fetchCourseInstructors(){
    $('#course_instructors').html(loadingHtml);
    $.get('/course/instructor', showCourseInstructors);
  }

  function showCourseInstructors(res){
    $('#course_instructors').html(res);
  }
</script>