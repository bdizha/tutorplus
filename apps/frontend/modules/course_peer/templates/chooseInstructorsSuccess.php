<div id="cboxLoadedContentInner">
  <div id="sf_admin_form_container">
    <div id="sf_admin_form_content">            
      <div class="sf_admin_form">
        <div id="choose_course_instructors_form_holder">
          <form id="choose_course_instructors_form" action="<?php echo url_for("@choose_course_instructors") ?>" method="post">
            <fieldset id="sf_fieldset_none">
              <?php foreach ($instructorPeers as $peer): ?>
                <?php $instructor = ($peer->getInviterId() == $sf_user->getId()) ? $peer->getInvitee() : $peer->getInviter() ?>
                <div class="course-follower">
                  <?php include_partial('personal_info/photo', array('profile' => $instructor, "dimension" => 36)) ?>
                  <div class="name"><?php echo $instructor ?></div>
                  <div class="input">
                    <input type="checkbox" class="input-checkbox" name="instructor[]" value="<?php echo $instructor->getId() ?>" <?php echo (isset($currentInstructorIds) && is_array($currentInstructorIds) && in_array($instructor["id"], $currentInstructorIds)) ? "checked='checked'" : "" ?> id="instructor_<?php echo $instructor->getId() ?>" class="choose-input" />
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
    $(".sf_admin_action_save_instructors input").click(function(){
      $("#cboxLoadedContentInner").hide();
      $("#cboxLoadedContent").append(loadingHtml);

      $("#choose_course_instructors_form").ajaxSubmit(function(data){
        $("#cboxLoadedContent").html(data);

        // fetch course instructors
        fetchCourseInstructors();
      });
      return false;
    });

    $(".cancel, .done").click(function(){
      $.fn.colorbox.close();
      return false;
    });
  });
</script>