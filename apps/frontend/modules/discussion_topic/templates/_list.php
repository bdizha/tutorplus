<div class="full-block">
    <?php if (!$discussionTopics->count()): ?>
        <div class="no-result">
            <?php echo __("There's no discussion topics posted yet.", array(), 'sf_admin') ?>
        </div>
    <?php else: ?>  
        <div id="discussion_topics">
            <?php foreach ($discussionTopics as $i => $discussionTopic): ?>
                <?php include_partial('discussion_topic/topic', array('discussionTopic' => $discussionTopic, "helper" => $helper)) ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>