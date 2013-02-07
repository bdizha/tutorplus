<?php use_helper('I18N', 'Date') ?>
<?php $discussionComment = Doctrine_Core::getTable('DiscussionComment')->find($activityFeed->getItemId()) ?>
<?php if ($discussionComment): ?>
    <?php $discussionTopic = $discussionComment->getDiscussionPost()->getDiscussionTopic() ?>
    <div class="timeline-row">
        <div class="heading">
            <?php include_partial('personal_info/photo', array('profile' => $discussionComment->getProfile(), "dimension" => 36)) ?>
            <?php echo link_to($discussionComment->getProfile(), 'profile_show', $discussionComment->getProfile()) ?>
            has submitted a discussion comment on topic:
            <?php echo link_to($discussionTopic->getSubject(), 'discussion_topic_show', $discussionTopic) ?>
            <span class="datetime"><?php echo myToolkit::dateInWords($discussionComment->getCreatedAt()) ?></span>
        </div>
    </div>
<?php endif; ?>