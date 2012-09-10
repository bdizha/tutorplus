<?php $user = $discussionTopicMessageReply->getUser() ?>
<div class="topic-reply">
    <div class="inline-block">
        <div class="photo">
            <img alt="<?php echo $discussionTopicMessageReply->getUser() ?>" src="/uploads/users/6/avatar_24.png" />
        </div>
    </div>
    <div class="inline-block">
        <div class="topic-reply-details">
            <a href="/backend.php/profile" class="name-title"><?php echo $discussionTopicMessageReply->getUser() ?></a>
            <span class="datetime"><?php echo false !== strtotime($discussionTopicMessageReply->getUpdatedAt()) ? distance_of_time_in_words(strtotime($discussionTopicMessageReply->getUpdatedAt())) . " ago" : '&nbsp;' ?></span>
            <p><?php echo $discussionTopicMessageReply->getReply() ?></p>
        </div>
    </div>
</div>