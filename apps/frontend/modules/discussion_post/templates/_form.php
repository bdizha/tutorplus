<div class="sf_admin_form">
  <div id="discussion_post_form_holder">
    <?php echo form_tag_for($form, '@discussion_post', array('id' => 'discussion_post_form')) ?>
    <?php echo $form->renderHiddenFields(false) ?>
    <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_message">    
      <div class="content ">
        <span class="placeholder">What do you have to share with your peers?</span>
        <div class="input"><?php echo $form["message"] ?></div>
      </div>
    </div>
    <div class="discussion_topic_actions">
      <input type="button" class="save" value="Post" />
    </div>
    </form>
  </div>
</div>
<script type='text/javascript'>
  //<![CDATA[
  $(document).ready(function() {
    $('#discussion_post_message').redactor();

    var redactorPlaceholder = $('#discussion_post_form .placeholder');
    var redactorTextarea = $('#discussion_post_form .redactor_editor');

    // make sure the placeholder is displayed accordingly
    redactorTextarea.focus(function() {
      redactorPlaceholder.hide();
    }).blur(function() {
      if (redactorTextarea.html() == redactorDefaultHtml) {
        redactorPlaceholder.show();
      }
      else {
        redactorPlaceholder.hide();
      }
    });

    $('#discussion_post_form_holder .save').click(function() {
      var messageTextarea = $('#discussion_post_message');
      var postButton = $(this);
      var message = messageTextarea.val();
      if ($.trim(message) == "") {
        alert("Please enter your post!");
        return;
      }

      if ($(this).val() != "Posting...") {
        $(this).val("Posting...");
        $("#discussion_post_form").ajaxSubmit(function(data) {
          if (data == "success") {
            $.get('<?php echo url_for('@discussion_post_show') ?>', {}, function(messageData) {
              $('#discussion-comments').prepend(messageData);
            }, 'html');

            // reset the form
            redactorTextarea.html(redactorDefaultHtml);
            messageTextarea.val("");
            postButton.val("Post");
            redactorPlaceholder.show();

            if ($('#messages-count') != "undefined") {
              // increment the messages count
              var messagesCount = $('#messages-count').html();
              messagesCount = parseInt(messagesCount) + 1;
              $('#messages-count').html(messagesCount);
            }
          }
        });
      }
    });
  });
  //]]>
</script>
