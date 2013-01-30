<div id="cboxLoadedContentInner">
  <div id="sf_admin_form_container">
    <div id="sf_admin_form_content">            
      <div class="sf_admin_form">
        <div id="choose_course_students_form_holder">
          <form id="choose_course_students_form" action="<?php echo url_for("@choose_course_students") ?>" method="post">
            <fieldset id="sf_fieldset_none">             
              <?php foreach ($studentPeers as $peer): ?>
                <?php $student = ($peer->getInviterId() == $sf_user->getId()) ? $peer->getInvitee() : $peer->getInviter() ?>
                <div class="course-follower">
                  <?php include_partial('personal_info/photo', array('profile' => $student, "dimension" => 36)) ?>
                  <div class="name"><?php echo $student ?></div>
                  <div class="input">
                    <input type="checkbox" class="input-checkbox" name="student[]" value="<?php echo $student->getId() ?>" <?php echo (isset($currentStudentIds) && is_array($currentStudentIds) && in_array($student["id"], $currentStudentIds)) ? "checked='checked'" : "" ?> id="student_<?php echo $student->getId() ?>" class="choose-input" />
                  </div>
                </div> 
              <?php endforeach; ?>
            </fieldset>
            <?php include_partial('common/form_actions') ?>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script type='text/javascript'>
  $(document).ready(function(){
    $(".sf_admin_action_save_students input").click(function(){
      $("#cboxLoadedContentInner").hide();
      $("#cboxLoadedContent").append(loadingHtml);

      $("#choose_course_students_form").ajaxSubmit(function(data){
        $("#cboxLoadedContent").html(data);

        // fetch course students
        fetchCourseStudents();
      });

      return false;
    });

    $(".cancel, .done").click(function(){
      $.fn.colorbox.close();
      return false;
    });
  });
</script>