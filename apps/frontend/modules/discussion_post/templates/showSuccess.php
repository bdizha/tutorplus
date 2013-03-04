<?php include_partial('discussion_post/post', array('discussionPost' => $discussionPost, "discussionCommentForm" => $discussionCommentForm, "discussionPostForm" => new DiscussionPostForm($discussionPost), "helper" => new discussion_postGeneratorHelper())) ?>
<?php include_partial('discussion_comment/js') ?>
<script type='text/javascript'>
    $(document).ready(function() {
        $('.message-edit textarea').redactor();

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
            var postid = $(this).attr("id");
            var message = $("#discussion_post_form_" + postid + " textarea").val();
            if ($.trim(message) == "") {
                alert("Please enter your Discussion post!");
                return;
            }

            if ($(this).val() != "Updating...") {
                $(this).val("Updating...");
                $("#discussion_post_form_" + postid).ajaxSubmit(function(data) {
                    if (data == "success") {
                        $("#message-" + postid).html(message);
                    }
                    else {
                        alert("Oops! Your post couldn't be edited at this time.");
                    }
                });
                $("#message-" + postid).removeClass("editing");
                $(this).val("Update");
            }
        });
    });
</script>