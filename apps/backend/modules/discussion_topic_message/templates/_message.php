<?php use_helper('I18N', 'Date') ?>
<div class="thread discussion-reply" id="discussion-reply-<?php echo $discussionTopicMessage->getId() ?>">
    <?php include_partial('personal_info/photo', array('user' => $discussionTopicMessage->getUser(), "dimension" => 48)) ?>
    <div class="message">
        <div class="value"><?php echo $discussionTopicMessage->getMessage() ?></div>
        <div class="user">By <?php echo link_to($discussionTopicMessage->getUser(), 'profile_show', $discussionTopicMessage->getUser()) ?> - <span class="datetime"><?php echo false !== strtotime($discussionTopicMessage->getUpdatedAt()) ? distance_of_time_in_words(strtotime($discussionTopicMessage->getUpdatedAt())) . " ago" : '&nbsp;' ?></span></div>
    </div>
    <div class="comments">
        <div class="comment">
            <span class="stats-item replies-count"><span id="replies-count-<?php echo $discussionTopicMessage->getId() ?>"><?php echo $discussionTopicMessage->getReplies()->count() ?></span> comment(s)</span>
        </div>
        <div id="discussion-topic-replies-<?php echo $discussionTopicMessage->getId() ?>">
            <?php include_partial("discussion_topic_reply/replies", array("discussionTopicMessageReplies" => $discussionTopicMessage->getReplies())) ?>            
        </div>
        <div id="discussion-topic-reply-form-holder-<?php echo $discussionTopicMessage->getId() ?>" class="comment reply-details">
            <?php include_partial("discussion_topic_reply/form", array("form" => $form, "discussionTopicMessageId" => $discussionTopicMessage->getId())) ?>
        </div>
    </div>
</div>