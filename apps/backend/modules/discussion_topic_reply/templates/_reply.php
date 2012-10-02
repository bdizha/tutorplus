<?php $user = $discussionTopicMessageReply->getUser() ?>
<div class="comment">
    <a class="image" href="/backend.php/profile">
        <?php include_partial('personal_info/photo', array('user' => $discussionTopicMessageReply->getUser(), "dimension" => 36)) ?>
    </a>
    <div class="value"><?php echo $discussionTopicMessageReply->getReply() ?></div>
    <div class="user">By <a href="/backend.php/profile"><?php echo $discussionTopicMessageReply->getUser() ?></a>  - <span class="datetime"><?php echo false !== strtotime($discussionTopicMessageReply->getUpdatedAt()) ? distance_of_time_in_words(strtotime($discussionTopicMessageReply->getUpdatedAt())) . " ago" : '&nbsp;' ?></span></div>
</div>