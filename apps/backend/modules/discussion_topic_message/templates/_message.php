<?php use_helper('I18N', 'Date') ?>
<div class="thread discussion-reply" id="discussion-reply-<?php echo $discussionTopicMessage->getId() ?>">
    <a class="image" href="/backend.php/profile"><img height="48px" width="48px" alt="<?php echo $discussionTopicMessage->getUser() ?>" src="/avatars/48.png"></a>
    <div class="message">
        <div class="value"><?php echo $discussionTopicMessage->getMessage() ?></div>
        <div class="user">By <a href="/backend.php/profile"><?php echo $discussionTopicMessage->getUser() ?></a>  - <span class="datetime"><?php echo false !== strtotime($discussionTopicMessage->getUpdatedAt()) ? distance_of_time_in_words(strtotime($discussionTopicMessage->getUpdatedAt())) . " ago" : '&nbsp;' ?></span></div>
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