<?php use_helper('I18N', 'Date') ?>
<div class="discussion-reply" id="discussion-reply-<?php echo $discussionTopicMessage->getId() ?>">
    <div class="message">
        <div class="inline-block">
            <div class="image">
                <img alt="<?php echo $discussionTopicMessage->getUser() ?>" src="/uploads/users/6/avatar_36.png" />
            </div>
        </div>
        <div class="inline-block topic-message-details">
            <div class="meta">
                <a class="owner" href="/backend.php/profile"><?php echo $discussionTopicMessage->getUser() ?></a>
                <span class="datetime"><?php echo false !== strtotime($discussionTopicMessage->getUpdatedAt()) ? distance_of_time_in_words(strtotime($discussionTopicMessage->getUpdatedAt())) . " ago" : '&nbsp;' ?></span>
            </div>
            <div class="body">	
                <?php echo $discussionTopicMessage->getMessage() ?>	      					
            </div>   
            <div class="replies">
                <div class="stats">
                    <span class="stats-item replies-count"><span id="replies-count-<?php echo $discussionTopicMessage->getId() ?>"><?php echo $discussionTopicMessage->getReplies()->count() ?></span> replies</span>
                </div>
                <div id="discussion-topic-replies-<?php echo $discussionTopicMessage->getId() ?>">
                    <?php include_partial("discussion_topic_reply/replies", array("discussionTopicMessageReplies" => $discussionTopicMessage->getReplies())) ?>
                </div>
                <div class="reply">
                    <div class="inline-block">
                        <div class="photo">
                            <img alt="<?php echo $discussionTopicMessage->getUser() ?>" src="/uploads/users/6/avatar_24.png" />
                        </div>
                    </div>
                    <div class="inline-block">
                        <div id="discussion-topic-reply-form-holder-<?php echo $discussionTopicMessage->getId() ?>" class="reply-details">
                            <?php include_partial("discussion_topic_reply/form", array("form" => $form, "discussionTopicMessageId" => $discussionTopicMessage->getId())) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>