<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->showLinks($course)) ?>
<?php include_partial('common/breadcrumbs', $helper->showBreadcrumbs($course)) ?>
<div class="sf_admin_heading">
  <h3><?php echo __('%%code%% ~ %%name%%', array('%%code%%' => $course->getCode(), '%%name%%' => $course->getName()), 'messages') ?></h3>
</div>
<div id="sf_admin_container">
  <div id="sf_admin_content">
    <div class="content-block">
      <h4>Course info <?php echo $helper->showToEdit($course) ?></h4>
      <div class="full-block">
        <div class="course-image">
          <img src="/profile/show/photo/3/128/1357767921" class="image" alt="<?php echo $course->getCode() ?>" title="<?php echo $course->getCode() ?>">
        </div>
        <div class="course-info">
          <div class="course-row">
            <div class="row-label">
              Institution:
            </div>
            <div class="row-value">
              <?php echo $course->getDepartment()->getFaculty()->getInstitution() ?>                 
            </div>
          </div>
          <div class="course-row">
            <div class="row-label">
              Department:
            </div>
            <div class="row-value">
              <?php echo $course->getDepartment() ?>                 
            </div>
          </div>                    
          <div class="course-row">
            <div class="row-label">
              Active dates:
            </div>
            <div class="row-value">
              <?php echo $course->getDateTimeObject('start_date')->format('M jS Y') ?> - <?php echo $course->getDateTimeObject('end_date')->format('M jS Y') ?>                          
            </div>
          </div>
          <div class="course-row">
            <div class="row-label">
              Is active:
            </div>
            <div class="row-value">
              <?php echo $course->getIsFinalized() ? "Yes" : "No" ?>                 
            </div>
          </div>  
          <div class="course-row">
            <div class="row-label">
              Duration:
            </div>
            <div class="row-value">
              <?php echo (int) ($course->getHours() / 24 / 7) ?> weeks long             
            </div>
          </div>
          <div class="course-row">
            <div class="row-label">
              Max enrolled:
            </div>
            <div class="row-value">
              <?php echo $course->getMaxEnrolled() ?> students              
            </div>
          </div>                       
        </div>   
      </div>                
    </div>
    <div class="content-block">
      <h4>About the instructor (s)</h4>
      <div class="full-block">
        <div id="course_instructors">
          <?php include_partial('peer/list', array("peers" => $courseInstructorPeers)) ?>
        </div>
      </div>
      <?php include_partial('common/actions', array('actions' => array("manage_instructors" => array("title" => "Manage Instructors")))) ?>
    </div>
    <div class="content-block">
      <h4>About the course</h4>
      <div class="full-block">
        <div class="course-row" id="course_discription">
          <?php echo $course->getDescription() ?>
        </div>
      </div>
    </div>
    <?php include_partial('common/actions', array('actions' => array("course_assignments" => array("title" => "Course Assignments", "url" => "assignment"), "my_courses" => array("title" => "< My Courses", "url" => "my/courses")))) ?>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $(".sf_admin_action_manage_instructors input").click(function(){
      openPopup("/choose/course/instructors",'513px','480px',"<?php echo __('Manage Course Instructors', Array(), 'messages') ?>");
      return false;
    });
  });

  function fetchCourseInstructors(){
    $('#course_instructors').html(loadingHtml);
    $.get('/course/instructor',showCourseInstructors);
  }

  function showCourseInstructors(res){
    $('#course_instructors').html(res);
  }
</script>