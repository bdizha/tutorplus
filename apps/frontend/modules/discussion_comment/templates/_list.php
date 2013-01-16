<?php foreach ($discussionTopicMessageReplies as $discussionTopicMessageReply): ?>
    <?php include_partial("discussion_topic_reply/reply", array("discussionTopicMessageReply" => $discussionTopicMessageReply)) ?>
<?php endforeach; ?>