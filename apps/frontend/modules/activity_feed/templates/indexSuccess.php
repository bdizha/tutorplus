<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->indexLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs()) ?>
<div class="sf_admin_heading">
    <h3>Activity Feeds ~ <?php echo $sf_user->getProfile()->getCreatedAt("Y") ?> to this day</h3>
</div>
<div id="sf_admin_content">
    <div class="content-block" id="timeline">
        <div id="discussion_post_form_container">
            <?php include_partial('discussion_post/form', array('discussion_post' => new DiscussionPost(), 'form' => $discussionPostForm)) ?>
        </div>
        <div id="discussion-comments">
            <?php foreach ($activityFeeds as $key => $activityFeed): ?>
                <?php include_partial('activity_feed/snapshot', array('activityFeed' => $activityFeed)) ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<script type='text/javascript'>
    $(document).ready(function() {
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
    });
</script>