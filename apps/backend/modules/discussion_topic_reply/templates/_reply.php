<?php $user = $discussionTopicMessageReply->getUser() ?>
<div class="comment">
    <?php include_partial('personal_info/photo', array('user' => $discussionTopicMessageReply->getUser(), "dimension" => 36)) ?>
    <div class="value"><?php echo $discussionTopicMessageReply->getReply() ?></div>
    <div class="user">By <?php echo link_to($discussionTopicMessageReply->getUser(), 'profile_show', $discussionTopicMessageReply->getUser()) ?> - <span class="datetime"><?php echo false !== strtotime($discussionTopicMessageReply->getUpdatedAt()) ? distance_of_time_in_words(strtotime($discussionTopicMessageReply->getUpdatedAt())) . " ago" : '&nbsp;' ?></span></div>
</div>