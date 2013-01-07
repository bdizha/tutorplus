<?php use_helper('I18N', 'Date') ?>
<?php $discussionTopicMessage = Doctrine_Core::getTable('DiscussionPost')->find($activityFeed->getItemId()) ?>
<?php $replyForm = new DiscussionCommentForm() ?>
<?php $replyForm->setDefault("discussion_topic_message_id", $discussionTopicMessage->getId()) ?>
<?php if ($discussionTopicMessage): ?>
  <div class="snapshot">
    <div class="heading">
      <?php include_partial('personal_info/photo', array('profile' => $discussionTopicMessage->getProfile(), "dimension" => 48)) ?>
      <div class="name"><?php echo link_to($discussionTopicMessage->getProfile(), 'profile_show', $discussionTopicMessage->getProfile()) ?> on</div>
      <div class="datetime"><?php echo $discussionTopicMessage->getUpdatedAt() ?></div> posted:
    </div>
    <div class="body"><?php echo $discussionTopicMessage->getMessage() ?></div>
    <div class="comments">
      <div class="statistics">
        <span class="stats-item replies-count"><span class="list-count" id="replies-count-<?php echo $discussionTopicMessage->getId() ?>"><?php echo $discussionTopicMessage->getReplies()->count() ?></span> comment(s) &dArr;</span> 
      </div>
      <div id="discussion-topic-replies-<?php echo $discussionTopicMessage->getId() ?>">
        <?php foreach ($discussionTopicMessage->getReplies() as $discussionTopicMessageReply): ?>
          <?php include_partial("discussion_topic_reply/reply", array("discussionTopicMessageReply" => $discussionTopicMessageReply)) ?>
        <?php endforeach; ?>
      </div>
      <div id="discussion-topic-reply-form-holder-<?php echo $discussionTopicMessage->getId() ?>" class="comment reply-details">
        <?php include_partial("discussion_topic_reply/form", array("form" => $replyForm, "discussionTopicMessageId" => $discussionTopicMessage->getId())) ?>
      </div>
    </div>
  </div>
<?php endif; ?>