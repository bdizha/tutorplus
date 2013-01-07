<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->indexLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs()) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
  <h3>Activity Feeds ~ 3rd Janauary to this day</h3>
</div>
<div id="sf_admin_content">
  <div class="content-block" id="timeline">
    <div id="discussion_topic_message_form_container">
      <?php include_partial('discussion_topic_message/form', array('discussion_topic_message' => new DiscussionPost(), 'form' => $messageForm)) ?>
    </div>
    <div id="discussion-topic-replies">
      <?php foreach ($activityFeeds as $key => $activityFeed): ?>
        <?php include_partial('activity_feed/snapshot', array('activityFeed' => $activityFeed)) ?>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<script type='text/javascript'>
  $(document).ready(function() {
    $("a.reply").click(function() {
      $(".discussion_topic_reply").hide();
      $("#discussion_topic_" + $(this).attr("id")).show();
      return false;
    });

    // submit discussion topic replies
    $('.submit-discussion-topic-reply').click(function() {
      var commentButton = $(this);
      var messageId = commentButton.attr('messageid');
      var redactorTextarea = $('#discussion-topic-reply-form-' + messageId + ' .redactor_editor');
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