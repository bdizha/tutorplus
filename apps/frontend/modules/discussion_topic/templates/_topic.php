<?php use_helper('I18N', 'Date') ?>
<?php if ($discussionTopic): ?>
    <div class="heading">
        <?php include_partial('personal_info/photo', array('profile' => $discussionTopic->getProfile(), "dimension" => 48)) ?>
        <div class="name"><?php echo link_to($discussionTopic->getProfile(), 'profile_show', $discussionTopic->getProfile()) ?></div> on
        <div class="datetime"><?php echo $discussionTopic->getUpdatedAt() ?></div> created topic:
    </div>
    <div class="body">
        <?php echo link_to($discussionTopic->getSubject(), 'discussion_topic_show', $discussionTopic) ?>
        <?php echo $discussionTopic->getMessage() ?>
    </div>
    <?php if ($discussionTopic->getProfileId() == $sf_user->getId() && !isset($showActions)): ?>
        <div class="inline-content-actions">
            <?php echo $helper->linkToDiscussionTopicView($discussionTopic, array()) ?>
            <?php echo $helper->linkToDiscussionTopicEdit($discussionTopic, array()) ?>
            <?php echo $helper->linkToDiscussionTopicDelete($discussionTopic, array("confirm" => "Are you sure?")) ?>
        </div>
    <?php endif; ?>
    <div class="statistics">
        <span class="list-count">125</span> posts <span class="list-count">999+</span> comments <span class="list-count">455</span> views
    </div>
<?php endif; ?>