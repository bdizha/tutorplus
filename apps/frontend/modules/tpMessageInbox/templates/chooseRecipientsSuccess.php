<div id="cboxLoadedContentInner">
  <div id="sf_admin_form_container">
    <div id="sf_admin_form_content">            
      <div class="sf_admin_form">
        <div class="choose-participants">
          <form id="message_choose_recipients_form" action="/message/choose/recipients/<?php echo $type ?>" method="post">
              <div class="follower-filters">
                <ul class="nav-tabs">
                  <li class="active-tab">
                    <a href="#" tab="student_recipients" class="tab-title">Students</a>
                  </li>
                  <li>
                    <a href="#" tab="instructor_recipients" class="tab-title">Instructors</a>
                  </li>
                  <li>
                    <a href="#" tab="mailing_list_followers" class="tab-title">Mailing Lists</a>
                  </li>
                </ul>
              </div>
            <fieldset id="sf_fieldset_none">
              <div class="recipients-tab" id="student_recipients">
                <?php if (!$studentPeers->count()): ?>
                  <div class="no-result">There isn't any student peers in your profile, yet.</div>
                <?php else: ?>       
                  <?php foreach ($studentPeers as $peer): ?>
                    <?php $student = ($peer->getInviterId() == $sf_user->getId()) ? $peer->getInvitee() : $peer->getInviter() ?>
                    <div class="email-recipient">
                      <?php include_partial('tpPersonalInfo/photo', array('profile' => $student, "dimension" => 36)) ?>
                      <div class="name"><?php echo $student->getName() ?></div>
                      <div class="input">
                        <input type="checkbox" class="input-checkbox" name="recipient[<?php echo $type ?>][student][]" value="<?php echo $student["id"] ?>" <?php echo (isset($recipient[$type]['student']) && is_array($recipient[$type]['student']) && in_array($student["id"], $recipient[$type]['student'])) ? "checked='checked'" : "" ?> id="recipient_student_<?php echo $student->getId() ?>" class="choose-input" />                
                      </div>
                    </div> 
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
              <div class="recipients-tab hide" id="instructor_recipients">
                <?php if (!$instructorPeers->count()): ?>
                  <div class="no-result">There isn't any instructor peers in your profile, yet.</div>
                <?php else: ?>
                  <?php foreach ($instructorPeers as $peer): ?>
                    <?php $instructor = ($peer->getInviterId() == $sf_user->getId()) ? $peer->getInvitee() : $peer->getInviter() ?>
                    <div class="email-recipient">
                      <?php include_partial('tpPersonalInfo/photo', array('profile' => $instructor, "dimension" => 36)) ?>
                      <div class="name"><?php echo $instructor->getName() ?></div>
                      <div class="input">
                        <input type="checkbox" class="input-checkbox" name="recipient[<?php echo $type ?>][instructor][]" value="<?php echo $instructor["id"] ?>" <?php echo (isset($recipient[$type]['instructor']) && is_array($recipient[$type]['instructor']) && in_array($instructor["id"], $recipient[$type]['instructor'])) ? "checked='checked'" : "" ?> id="recipient_student_<?php echo $instructor->getId() ?>" class="choose-input" />                
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
              <div class="recipients-tab hide" id="mailing_list_followers">
                <?php if (!count($mailingLists)): ?>
                  There isn't any mailing list in your profile, yet.
                <?php else: ?>
                  <?php foreach ($mailingLists as $mailingList): ?>
                    <div class="email-recipient">
                      <?php include_partial('tpPersonalInfo/photo', array('profile' => $mailingList->getProfile(), "dimension" => 36)) ?>
                      <div class="name"><?php echo $mailingList["name"] ?></div>
                      <div class="input">
                        <input type="checkbox" class="input-checkbox" name="recipient[<?php echo $type ?>][mailing_list][]" value="<?php echo $mailingList["id"] ?>" <?php echo (isset($recipient[$type]['mailing_list']) && is_array($recipient[$type]['mailing_list']) && in_array($mailingList["id"], $recipient[$type]['mailing_list'])) ? "checked='checked'" : "" ?> id="recipient_mailing_list_<?php echo $mailingList["id"] ?>" class="choose-input" />                
                      </div>
                    </div> 
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
            </fieldset>
          </form>        
        </div>
            <?php include_partial('tpCommon/form_actions') ?>
      </div>
    </div>
  </div>
</div>
<div id="recipients-holder" class="hide">
  <?php include_partial('email_recipients', array('type' => $type, 'mailingLists' => $mailingLists)) ?>
</div>
<script type='text/javascript'>
  $(document).ready(function(){
    $(".nav-tabs a").click(function(){
      $(".nav-tabs li").removeClass("active-tab");
      $(this).parent().addClass("active-tab");

      $(".recipients-tab").addClass("hide");
      $("#" + $(this).attr("tab")).removeClass("hide");
    });

    // push the newly added recipients to the message
    $("#<?php echo $type ?>_recipients").html($("#recipients-holder").html());

    $(".sf_admin_action_add_recipients input").click(function(){
      $("#cboxLoadedContentInner").hide();
      $("#cboxLoadedContent").append(loadingHtml);

      $("#message_choose_recipients_form").ajaxSubmit(function(data){
        $("#cboxLoadedContent").html(data);
      });
      //$.fn.colorbox.resize();
      return false;
    });

    $(".cancel, .done").click(function(){
      $.fn.colorbox.close();
      return false;
    });
  });
</script>