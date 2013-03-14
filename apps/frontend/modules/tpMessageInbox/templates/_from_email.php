<div class="sf_admin_form_row sf_admin_text sf_admin_form_field_from_email">    
  <?php $profile = $sf_user->getProfile() ?>
  <div>
    <label for="email_message_from_email">From:</label>
    <div class="content">
      <input type="hidden" name="email_message[from_email]" value="<?php echo $profile->getEmail() ?>" id="email_message_from_email"/>
      <input type="hidden" name="email_message[reply_to]" value="<?php echo $profile->getEmail() ?>" id="email_message_freply_to"/>
      <?php include_partial('personal_info/photo', array('profile' => $profile, "dimension" => 24)) ?>
      <?php echo $profile->getName() . "&nbsp;&lt;" . $profile->getEmail() . "&gt;" ?>
      <div class="email-recipient-actions">
        <input class="choose-recipient button" id="to_email" title="To" type="button" value="To"/>
        <input class="choose-recipient button" id="cc_email" title="Cc" type="button" value="Cc"/>
        <input class="choose-recipient button" id="bcc_email" title="Bcc" type="button" value="Bcc"/>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $(".choose-recipient").live("click",function(){
      var type = $(this).attr("id");
      var title = $(this).attr("title");
      var url = '/message/choose/recipients/' + type;
      openPopup(url,'513px','480px','Add (' + title + ') Message Recipients');
      return false;
    });
  });
</script>