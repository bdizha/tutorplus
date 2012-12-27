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
    <h3><?php echo __('Discussion Topic ~ %%name%%', array('%%name%%' => $discussionTopic->getSubject()), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">
    <div id="sf_admin_content">
        <div class="content-block">
            <div class="top-actions">
                <?php echo $helper->linkToInviteFollowers() ?>
            </div>
            <div class="discussion-left-block">
                <h2><?php echo $discussionTopic->getSubject() ?></h2>
                <?php include_partial('discussion_topic/topic', array('discussionTopic' => $discussionTopic, "helper" => $helper)) ?>
                <?php include_partial('common/actions', array('actions' => $helper->showContentActions($discussionTopic))) ?>
            </div>
            <div class="discussion-right-block">
                <h2>Suggested Followers</h2>
                <div id="suggested-followers">
                    <?php if (count($suggestedFollowers) > 0): ?>
                        <?php foreach ($suggestedFollowers as $suggestedFollower): ?>
                            <div class="follower"> 
                                <?php include_partial('personal_info/photo', array('user' => $suggestedFollower, "dimension" => 48)) ?>
                                <div class="name"><?php echo link_to($suggestedFollower->getName(), 'profile_show', $suggestedFollower) ?></div>
                                <div class="peer-actions">
                                    <input class="invite" userid="<?php echo $suggestedFollower->getId() ?>" value="Accept" type="button">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="no-result">There's no followers to suggest.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="content-block">
            <div class="discussion-left-block">
                <h2><span class="list-count" id="replies-count"><?php echo $discussionTopic->getNbReplies() ?></span> replies  of <span id="messages-count" class="list-count"><?php echo $discussionTopic->getNbMessages() ?></span> post(s)</h2>
                <div id="discussion_topic_message_form_container">
                    <div id="sf_admin_form_container">
                        <?php include_partial('common/flashes', array('form' => $messageForm)) ?>
                        <?php include_partial('discussion_topic_message/form', array('discussion_topic_message' => new DiscussionTopicMessage(), 'form' => $messageForm)) ?>
                    </div>
                </div>
                <div class="full-block ">
                    <div id="discussion-topic-replies">
                        <?php foreach ($discussionTopic->retrieveMessages() as $discussionTopicMessage): ?>
                            <?php include_partial('discussion_topic_message/message', array('discussionTopicMessage' => $discussionTopicMessage, "form" => $replyForm)) ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="discussion-right-block">
                <h2>Discussion Followers</h2>
                <div id="discussion-followers">
                    <?php $members = $discussionTopic->getDiscussion()->retrieveMembers(); ?>
                    <?php if ($members->count() > 0): ?>
                        <?php foreach ($members as $member): ?>
                            <div class="participant">
                                <?php include_partial('personal_info/photo', array('user' => $member->getUser(), "dimension" => 36)) ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="no-result">There's no followers invited.</div>
                    <?php endif; ?>
                    <div class="clear">&nbsp;</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
    $(document).ready(function(){
        $('#left-column').css("display", "none");
        $('#middle-column').css("margin-left", "0");
        $('#middle-column, #sf_admin_content').css("width", "940px");
        
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
            var userId = $(this).attr("userid");
            $.get('/discussion/member/accept/' + userId, {}, function (response) {
                $("#discussion-notice").html(response);
                $(".notice").hide();
                $("#discussion-notice").show();
                setTimeout(function(){
                    $(".notice").hide();
                },3000);
                $("#suggested-followers").load("/discussion/member/suggested");
            }, 'html');
        });
    });
</script>
