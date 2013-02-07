<?php use_helper('I18N', 'Date') ?>
<?php $discussionTopic = Doctrine_Core::getTable('DiscussionTopic')->findOneById($activityFeed->getItemId()) ?>
<?php if ($discussionTopic): ?>
    <div class="timeline-row">
        <div class="heading">
            <?php include_partial('personal_info/photo', array('profile' => $discussionTopic->getProfile(), "dimension" => 36)) ?>
            <?php echo link_to($discussionTopic->getProfile(), 'profile_show', $discussionTopic->getProfile()) ?> has started a discussion topic:
            <?php echo link_to($discussionTopic->getSubject(), 'discussion_topic_show', $discussionTopic) ?> -
            <span class="datetime"><?php echo myToolkit::dateInWords($discussionTopic->getCreatedAt()) ?></span>
        </div>
    </div>
<?php endif; ?>