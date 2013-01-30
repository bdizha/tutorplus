<?php if (!$discussionTopics->count()): ?>
    <div class="no-result">
        <?php echo __("There isn't any group topics posted yet.", array(), 'sf_admin') ?>
    </div>
<?php else: ?>  
    <?php foreach ($discussionTopics as $i => $discussionTopic): ?>
        <div class="snapshot">
            <?php include_partial('discussion_topic/topic', array('discussionTopic' => $discussionTopic, "helper" => $helper)) ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>