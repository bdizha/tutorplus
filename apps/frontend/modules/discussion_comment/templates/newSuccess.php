<?php use_helper('I18N', 'Date') ?>
<?php include_partial("discussion_comment/form", array("form" => $form, "discussionPostId" => $discussionPost->getId())) ?>
<script type='text/javascript'>
    //<![CDATA[
    $(document).ready(function(){
        // submit a DiscussionGroup comment
        $('.submit-discussion-comment').click(function() {
            var $this = $(this);
            var messageId = $this.attr('messageid'); 
            var comment = $.trim($('#discussion-comment-form-' + messageId + ' textarea').val());
            
            if($this.val() != "Commenting..." && comment != ""){
                $this.val("Commenting...");          
                $('#discussion-comment-form-' + messageId).ajaxSubmit(function(data){             
                    if(data != 'failure'){
                        $.get('/discussion/comment/' + data, {}, function(replyData){   
                            $('#discussion-comments-' + messageId).append(replyData);
                        }, 'html');                    
                    
                        // increment the comment count
                        var postCommentCount = $('#comment-count-' + messageId).html();           
                        var topicCommentCount = $('#comment-count').html();           
                        postCommentCount = parseInt(postCommentCount) + 1;  
                        topicCommentCount = parseInt(topicCommentCount) + 1;
                
                        $('#comment-count-' + messageId).html(postCommentCount);
                        $('#comment-count').html(topicCommentCount);
                        $('#discussion-comment-form-holder-' + messageId).load('/discussion/comment/new');                
                    }
                });
                return false;
            }
        });
    });
    //]]>
</script>