<?php include_partial('discussion_topic_message/message', array('discussionTopicMessage' => $discussionTopicMessage, "replyForm" => $replyForm, "messageForm" => new DiscussionPostForm($discussionTopicMessage), "helper" => new discussion_topic_messageGeneratorHelper())) ?>
<script type='text/javascript'>
  $(document).ready(function() {
    $('.message-edit textarea').redactor();

    $("a.reply").click(function() {
      $(".discussion_topic_reply").hide();
      $("#discussion_topic_" + $(this).attr("id")).show();
      return false;
    });

    // submit discussion topic replies
    $('.submit-discussion-topic-reply').click(function() {
      var commentButton = $(this);
      var redactorTextarea = $('#discussion-topic-reply-form-' + messageId + ' .redactor_editor');
      var messageId = commentButton.attr('messageid');
      var commentTextarea = $('#discussion-topic-reply-form-' + messageId + ' textarea');

      if (commentButton.val() != "Commenting..." && commentTextarea.val() != "") {
        commentButton.val("Commenting...");
        $('#discussion-topic-reply-form-' + messageId).ajaxSubmit(function(data) {
          if (data != 'failure') {
            $.get('/discussion_topic_reply/' + data, {}, function(comment) {
              $('#discussion-topic-replies-' + messageId).append(comment);
            }, 'html');

            // increment the replies count
            var messageRepliesCount = $('#replies-count-' + messageId).html();
            var topicRepliesCount = $('#replies-count').html();
            messageRepliesCount = parseInt(messageRepliesCount) + 1;
            topicRepliesCount = parseInt(topicRepliesCount) + 1;

            $('#replies-count-' + messageId).html(messageRepliesCount);
            $('#replies-count').html(topicRepliesCount);

            // reset the form
            commentTextarea.val("");
            redactorTextarea.html(redactorDefaultHtml);
            commentButton.val("Comment");
          }
        });
        return false;
      }
    });

    $(".message").hover(function() {
      if (!$(this).hasClass("editing")) {
        $(this).children(".inline-content-actions").show();
      }
    },
    function() {
      $(this).children(".inline-content-actions").hide();
    });

    $(".message .button-edit").click(function() {
      $("#message-" + $(this).attr("id")).addClass("editing");
      $("#message-" + $(this).attr("id") + " .view-mode").hide();
      $("#message-" + $(this).attr("id") + " .edit-mode").show();
      return false;
    });

    $('.update').click(function() {
      var messageId = $(this).attr("id");
      var message = $("#discussion_topic_message_form_" + messageId + " textarea").val();
      if ($.trim(message) == "") {
        alert("Please enter your discussion post!");
        return;
      }

      if ($(this).val() != "Updating...") {
        $(this).val("Updating...");
        $("#discussion_topic_message_form_" + messageId).ajaxSubmit(function(data) {
          if (data == "success") {
            $("#message-" + messageId).html(message);
          }
          else {
            alert("Oops! Your post couldn't be edited at this time.");
          }
        });
        $("#message-" + messageId).removeClass("editing");
        $(this).val("Update");
      }
    });
  });
</script>