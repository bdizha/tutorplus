<?php use_helper('I18N', 'Date') ?>
<?php $discussionPost = Doctrine_Core::getTable('DiscussionPost')->find($activityFeed->getItemId()) ?>
<?php if ($discussionPost): ?>
    <?php $discussionTopic = $discussionPost->getDiscussionTopic() ?>
    <div class="timeline-row">
        <div class="heading">
            <?php include_partial('personal_info/photo', array('profile' => $discussionPost->getProfile(), "dimension" => 36)) ?>
            <?php echo link_to($discussionPost->getProfile(), 'profile_show', $discussionPost->getProfile()) ?>
            has submitted a discussion post on topic:
            <?php echo link_to($discussionTopic->getSubject(), 'discussion_topic_show', $discussionTopic) ?>
            <span class="datetime"><?php echo myToolkit::dateInWords($discussionPost->getCreatedAt()) ?></span>
        </div>
    </div>
<?php endif; ?>