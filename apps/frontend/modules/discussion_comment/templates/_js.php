<script type='text/javascript'>
    $(document).ready(function(){
        // submit a discussion comment
        $('.submit-discussion-comment').live("click",function(){
            var $this = $(this);
            var postId = $this.attr('postid');
            var comment = $.trim($('#discussion-comment-form-' + postId + ' textarea').val());

            if ($this.val() != "Commenting..." && comment != "") {
                $this.val("Commenting...");
                $('#discussion-comment-form-' + postId).ajaxSubmit(function(data){
                    if (data != 'failure') {
                        $.get('/discussion/comment/' + data,{},function(replyData){
                            $('#discussion-comments-' + postId).append(replyData);
                        },'html');

                        // increment the comment count
                        var postCommentCount = $('#comment-count-' + postId).html();
                        var topicCommentCount = $('#comment-count').html();
                        postCommentCount = parseInt(postCommentCount) + 1;
                        topicCommentCount = parseInt(topicCommentCount) + 1;

                        $('#comment-count-' + postId).html(postCommentCount);
                        $('#comment-count').html(topicCommentCount);
                        $('#discussion-comment-form-holder-' + postId).load('/discussion/comment/new');
                    }
                });
                return false;
            }
        });

        $(".comment-toggler").live("click",function(){
            var postId = $(this).attr("postid");
            var discussionDomments = $("#discussion-comments-" + postId);
            if (discussionDomments.hasClass("hide")) {
                discussionDomments.removeClass("hide");
            }
            else{
                discussionDomments.addClass("hide");
            }
        });

        $(".discussion_post_placeholder").live("focus",function(){
            var topicid = $(this).attr("topicid");
            if (topicid !== "" && topicid !== 'undefined') {
                $(this).hide();
                var redactorPostHolder = $("#redactor_post_holder_" + topicid);
                if (redactorPostHolder !== 'undefined' && redactorPostHolder.hasClass("hide")) {
                    redactorPostHolder.removeClass("hide");
                }
            }
            else{
                alert("Oops, an error has occured!");
            }
        });

        $(".discussion_comment_placeholder").live("focus",function(){
            var postId = $(this).attr("postid");
            if (postId !== "" && postId !== 'undefined') {
                $(this).hide();
                var redactorCommentHolder = $("#redactor_comment_holder_" + postId);
                if (redactorCommentHolder !== 'undefined' && redactorCommentHolder.hasClass("hide")) {
                    redactorCommentHolder.removeClass("hide");
                }
            }
            else{
                alert("Oops, an error has occured!");
            }
        });
    });
</script>