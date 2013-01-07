<?php use_helper('I18N', 'Date') ?>
<div class="thread discussion-reply snapshot" id="discussion-reply-<?php echo $discussionTopicMessage->getId() ?>">
    <div class="heading">
        <?php include_partial('personal_info/photo', array('profile' => $discussionTopicMessage->getProfile(), "dimension" => 48)) ?>
        <div class="name"><?php echo link_to($discussionTopicMessage->getProfile(), 'profile_show', $discussionTopicMessage->getProfile()) ?> on</div>
        <div class="datetime"><?php echo $discussionTopicMessage->getUpdatedAt() ?></div> posted:
    </div>
    <div class="body message" id="message-<?php echo $discussionTopicMessage->getId() ?>">
        <div class="view-mode">
            <?php echo $discussionTopicMessage->getMessage() ?>            
        </div>
        <div class="edit-mode">
            <div class="message-edit" id="message-edit-<?php echo $discussionTopicMessage->getId() ?>">
                <?php include_partial('discussion_topic_message/inline_form', array('discussionTopicMessage' => $discussionTopicMessage, 'form' => $messageForm)) ?>
            </div>            
        </div>
        <div class="inline-content-actions">
            <?php echo $helper->linkToDiscussionPostEdit($discussionTopicMessage, array()) ?>
        </div>
    </div>
    <div class="comments">
        <div class="statistics">
            <span class="stats-item replies-count"><span class="list-count" id="replies-count-<?php echo $discussionTopicMessage->getId() ?>"><?php echo $discussionTopicMessage->getReplies()->count() ?></span> comment(s)</span>
        </div>
        <div id="discussion-topic-replies-<?php echo $discussionTopicMessage->getId() ?>">
            <?php include_partial("discussion_topic_reply/replies", array("discussionTopicMessageReplies" => $discussionTopicMessage->getReplies())) ?>            
        </div>
        <div id="discussion-topic-reply-form-holder-<?php echo $discussionTopicMessage->getId() ?>" class="comment reply-details">
            <?php include_partial("discussion_topic_reply/form", array("form" => $replyForm, "discussionTopicMessageId" => $discussionTopicMessage->getId())) ?>
        </div>
    </div>
</div>