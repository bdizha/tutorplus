<?php use_helper('I18N', 'Date') ?>
<div class="discussion_topic">
    <div class="discussion-view">
        <?php echo $helper->linkToDiscussionTopicView($discussionTopic, array()) ?>
    </div>
    <?php include_partial('personal_info/photo', array('user' => $discussionTopic->getUser(), "dimension" => 36)) ?>
    <div class="name"><?php echo link_to($discussionTopic->getSubject(), 'discussion_topic_show', $discussionTopic) ?></div>
    <div class="value"><?php echo isset($shortenString) ? myToolkit::shortenString($discussionTopic->getHtmlizedMessage(), $shortenString) : $discussionTopic->getHtmlizedMessage() ?></div>
    <div class="user_meta">By <?php echo link_to($discussionTopic->getUser(), 'profile_show', $discussionTopic->getUser()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($discussionTopic->getUpdatedAt()) ?></span> - <a href="/discussion/topic/<?php echo $discussionTopic->getSlug() ?>"><?php echo $discussionTopic->getNbReplies($sf_user->getId()) ?> new replies of <?php echo $discussionTopic->getNbMessages() ?> messages</a></div>
    <?php if ($discussionTopic->getUserId() == $sf_user->getId() && !isset($showActions)): ?>
        <div class="discussion-actions">
            <?php echo $helper->linkToDiscussionTopicEdit($discussionTopic, array()) ?>
            <?php echo $helper->linkToDiscussionTopicDelete($discussionTopic, array("confirm" => "Are you sure?")) ?>
        </div>
    <?php endif; ?>
</div>