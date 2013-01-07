<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php if ($course->getId()): ?>
    <?php include_component('common', 'menu', $helper->courseLinks($discussionTopic)) ?>
<?php else: ?>
    <?php include_component('common', 'menu', $helper->discussionLinks($discussionTopic)) ?>
<?php endif; ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php if ($course->getId()): ?>
    <?php include_partial('common/breadcrumbs', $helper->courseBreadcrumbs($discussionTopic)) ?>
<?php else: ?>
    <?php include_partial('common/breadcrumbs', $helper->discussionBreadcrumbs($discussionTopic)) ?>
<?php endif; ?>
<?php end_slot() ?>

<?php include_partial('discussion_topic/flashes') ?>
<div id="discussion-notice" class="notice">&nbsp;</div>
<div class="sf_admin_heading">
    <h3><?php echo __('Topic ~ %%name%%', array('%%name%%' => $discussionTopic->getSubject()), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">
    <div id="sf_admin_content">
        <div class="content-block">
            <div class="top-actions">
                <?php echo $helper->linkToInviteFollowers() ?>
            </div>
            <div id="discussion-topic">
                <div class="snapshot">
                    <div class="heading">
                        <?php include_partial('personal_info/photo', array('profile' => $discussionTopic->getProfile(), "dimension" => 48)) ?>
                        <div class="name"><?php echo link_to($discussionTopic->getProfile(), 'profile_show', $discussionTopic->getProfile()) ?></div> on
                        <div class="datetime"><?php echo $discussionTopic->getUpdatedAt() ?></div> created topic:
                    </div>
                    <div class="body">
                        <?php echo link_to($discussionTopic->getSubject(), 'discussion_topic_show', $discussionTopic) ?>
                        <?php echo $discussionTopic->getMessage() ?>
                    </div>
                    <div class="statistics">
                        <span class="list-count">125</span> posts <span class="list-count">999+</span> comments <span class="list-count">455</span> views
                    </div>
                </div>
            </div>
            <?php include_partial('common/actions', array('actions' => $helper->showContentActions($discussionTopic))) ?>
        </div>
        <div class="content-block">
            <div id="discussion_topic_message_form_container">
                <div id="sf_admin_form_container">
                    <?php include_partial('discussion_topic_message/form', array('discussion_topic_message' => new DiscussionPost(), 'form' => $messageForm)) ?>
                </div>
            </div>
            <div id="discussion-topic-replies">
                <?php foreach ($discussionTopic->retrieveMessages() as $discussionTopicMessage): ?>
                    <?php include_partial('discussion_topic_message/message', array('discussionTopicMessage' => $discussionTopicMessage, "replyForm" => $replyForm, "messageForm" => new DiscussionPostForm($discussionTopicMessage), "helper" => new discussion_topicGeneratorHelper())) ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
    $(document).ready(function(){ 
        $('.message-edit textarea').redactor();
        
        $("a.reply").click(function(){
            $(".discussion_topic_reply").hide();            
            $("#discussion_topic_" + $(this).attr("id")).show();
            return false;
        });
        
        $(".discussion_topic .edit").click(function(){            
            openPopup($(this).attr("href"), "600px", "600px", "Edit Discussion Topic");
            return false;
        });
        
        $("#invite_discussion_follower ").click(function(){
            openPopup($(this).attr("href"), '556px', '556px', '+ Invite Discussion Followers');
            return false;
        });
        
        // submit discussion topic replies
        $('.submit-discussion-topic-reply').click(function() {
            $this = $(this);
            $messageId = $this.attr('messageid');
            
            if($this.val() != "Loading..." && $('#discussion-topic-reply-form-' + $messageId + ' textarea').val() != ""){
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
        
        $(".peer-actions .invite").click(function(){
            var ProfileId = $(this).attr("ProfileId");
            $.get('/discussion/member/accept/' + ProfileId, {}, function (response) {
                $("#discussion-notice").html(response);
                $(".notice").hide();
                $("#discussion-notice").show();
                setTimeout(function(){
                    $(".notice").hide();
                },3000);
                $("#suggested-followers").load("/discussion/member/suggested");
            }, 'html');
        });
        
        $(".message").hover(function(){
            if(!$(this).hasClass("editing")){
                $(this).children(".inline-content-actions").show();            
            }
        },
        function(){
            $(this).children(".inline-content-actions").hide();
        });
        
        $(".message .button-edit").click(function(){
            $("#message-" + $(this).attr("id")).addClass("editing");
            $("#message-" + $(this).attr("id") + " .view-mode").hide();
            $("#message-" + $(this).attr("id") + " .edit-mode").show();
            return false;
        });   
        
        $('.update').click(function(){
            var messageId =  $(this).attr("id");
            var message = $("#discussion_topic_message_form_" + messageId + " textarea").val();            
            if( $.trim(message) == ""){
                alert("Please enter your discussion post!");
                return;
            }
            
            if($(this).val() != "Loading..."){
                $(this).val("Loading...");
                $("#discussion_topic_message_form_" + messageId).ajaxSubmit(function(data){                
                    if(data == "success"){                    
                        $("#message-" + messageId).html(message);
                    }
                    else{
                        alert("Oops! Your post couldn't be edited at this time.");            
                    }
                });
                $("#message-" + messageId).removeClass("editing");
                $(this).val("Update");
            }
        }); 
    });
</script>
