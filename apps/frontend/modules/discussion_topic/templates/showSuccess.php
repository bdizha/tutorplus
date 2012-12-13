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
<div class="sf_admin_heading">
    <h3><?php echo __('Discussion Topic ~ %%name%%', array('%%name%%' => $discussionTopic->getSubject()), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">
    <div id="sf_admin_content">
        <div class="content-block">
            <div class="discussion-left-block">
                <h2><?php echo $discussionTopic->getSubject() ?></h2>
                <?php include_partial('discussion_topic/topic', array('discussionTopic' => $discussionTopic, "helper" => $helper)) ?>
                <?php include_partial('common/content_actions', array('actions' => $helper->showContentActions($discussionTopic))) ?>
            </div>
            <div class="discussion-right-block">
                <h2>Suggested Followers</h2>
                <div id="discussion-participants">
                    <?php include_partial('personal_info/photo', array('user' => $discussionTopic->getDiscussion()->getUser(), "dimension" => 36)) ?>
                </div>
            </div>
        </div>
        <div class="content-block">
            <div class="discussion-left-block">
                <h2><span id="replies-count"><?php echo $discussionTopic->getNbReplies() ?></span> replies  of <span id="messages-count"><?php echo $discussionTopic->getNbMessages() ?></span> message(s)</h2>
                <div id="discussion_topic_message_form_container">
                    <div id="sf_admin_form_container">
                        <?php include_partial('common/flashes', array('form' => $messageForm)) ?>
                        <?php include_partial('discussion_topic_message/form', array('discussion_topic_message' => new DiscussionTopicMessage(), 'form' => $messageForm)) ?>
                    </div>
                </div>
                <div class="full-block plain-row">
                    <div id="discussion-topic-replies">
                        <?php foreach ($discussionTopic->retrieveMessages() as $discussionTopicMessage): ?>
                            <?php include_partial('discussion_topic_message/message', array('discussionTopicMessage' => $discussionTopicMessage, "form" => $replyForm)) ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="discussion-right-block">
                <h2>Discussion Participants</h2>
                <div id="discussion-participants">
                    <?php $members = $discussionTopic->getDiscussion()->retrieveMembers(); ?>
                    <?php if ($members->count() > 0): ?>
                        <?php foreach ($members as $member): ?>
                            <div class="participant">
                                <?php include_partial('personal_info/photo', array('user' => $member->getUser(), "dimension" => 36)) ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="no-result">There's no participants.</div>
                    <?php endif; ?>
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
    });    
</script>
