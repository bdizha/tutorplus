<?php include_partial('discussion_post/post', array('discussionPost' => $discussionPost, "discussionCommentForm" => $discussionCommentForm, "discussionPostForm" => new DiscussionPostForm($discussionPost), "helper" => new discussion_postGeneratorHelper())) ?>
<script type='text/javascript'>
    $(document).ready(function() {
        $('.message-edit textarea').redactor();

        // submit a discussion comment
        $('.submit-discussion-comment').click(function() {
            var $this = $(this);
            var messageId = $this.attr('messageid'); 
            var comment = $.trim($('#discussion-comment-form-' + messageId + ' textarea').val());
            
            if($this.val() != "Commenting..." && comment != ""){
                $this.val("Commenting...");          
                $('#discussion-comment-form-' + messageId).ajaxSubmit(function(data){             
                    if(data != 'failure'){
                        $.get('/discussion_comment/' + data, {}, function(replyData){   
                            $('#discussion-comments-' + messageId).append(replyData);
                        }, 'html');                    
                    
                        // increment the comment count
                        var postCommentCount = $('#comment-count-' + messageId).html();           
                        var topicCommentCount = $('#comment-count').html();           
                        postCommentCount = parseInt(postCommentCount) + 1;  
                        topicCommentCount = parseInt(topicCommentCount) + 1;
                
                        $('#comment-count-' + messageId).html(postCommentCount);
                        $('#comment-count').html(topicCommentCount);
                        $('#discussion-comment-form-holder-' + messageId).load('/discussion_comment/new');                
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
            var message = $("#discussion_post_form_" + messageId + " textarea").val();
            if ($.trim(message) == "") {
                alert("Please enter your discussion post!");
                return;
            }

            if ($(this).val() != "Updating...") {
                $(this).val("Updating...");
                $("#discussion_post_form_" + messageId).ajaxSubmit(function(data) {
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