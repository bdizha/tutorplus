<?php if (!$discussionTopics->count()): ?>
    <?php echo __("There isn't any topics posted yet.", array(), 'sf_admin') ?>
<?php else: ?>  
    <?php foreach ($discussionTopics as $i => $discussionTopic): ?>
        <?php include_partial('tpDiscussionTopic/topic', array('discussionTopic' => $discussionTopic, "helper" => $helper)) ?>
    <?php endforeach; ?>
<?php endif; ?>