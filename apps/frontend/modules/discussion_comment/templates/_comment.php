<?php $user = $discussionTopicMessageReply->getProfile() ?>
<div class="comment">
    <div class="heading">
        <?php include_partial('personal_info/photo', array('profile' => $discussionTopicMessageReply->getProfile(), "dimension" => 36)) ?>
        <div class="name"><?php echo link_to($discussionTopicMessageReply->getProfile(), 'profile_show', $discussionTopicMessageReply->getProfile()) ?></div>
        <div class="datetime"><?php echo $discussionTopicMessageReply->getUpdatedAt() ?></div> commented:
    </div>
    <div class="body">
        <?php echo $discussionTopicMessageReply->getReply() ?>
    </div>
</div>