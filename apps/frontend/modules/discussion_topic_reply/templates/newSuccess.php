<?php use_helper('I18N', 'Date') ?>
<?php include_partial("discussion_topic_reply/form", array("form" => $form, "discussionTopicMessageId" => $discussionTopicMessage->getId())) ?>
<script type='text/javascript'>
    //<![CDATA[
    $(document).ready(function(){
        // submit discussion topic replies
        $('.submit-discussion-topic-reply').click(function() {
            $this = $(this);
            $messageId = $this.attr('messageid');  
            
            $replyValue = trim($('#discussion-topic-reply-form-' + $messageId + ' textarea').val());
            
            if($this.val() != "Loading..." && $replyValue != ""){
                $this.val("Loading...");          
                $('#discussion-topic-reply-form-' + $messageId).ajaxSubmit(function(data){             
                    if(data != 'failure'){
                        $.get('/discussion_topic_reply/' + data, {}, function(replyData){   
                            $('#discussion-topic-replies-' + $messageId).append(replyData);
                        }, 'html');                    
                    
                        // increment the replies count
                        var $messageRepliesCount = $('#replies-count-' + $messageId).html();           
                        var $topicRepliesCount = $('#replies-count').html();           
                        $messageRepliesCount = parseInt($messageRepliesCount) + 1;  
                        $topicRepliesCount = parseInt($topicRepliesCount) + 1;
                
                        $('#replies-count-' + $messageId).html($messageRepliesCount);
                        $('#replies-count').html($topicRepliesCount);
                
                        $('#discussion-topic-reply-form-holder-' + $messageId).load('/discussion_topic_reply/new');                
                    }
                });
                return false;
            }
        });
    });
    //]]>
</script>