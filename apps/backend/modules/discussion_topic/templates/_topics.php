<h2>Discussion Topics - <?php echo $pager->getNbResults(); ?> topic(s)</h2>
<div class="full-block">
    <?php if (!$pager->getNbResults()): ?>
        <div class="no-result">
            <?php echo __('No posts', array(), 'sf_admin') ?>
        </div>
    <?php else: ?>  
        <div id="discussion_topics">
            <?php foreach ($pager->getResults() as $i => $discussion_topic): $odd = fmod(++$i, 2) ? 'odd' : 'even' ?>
                <?php include_partial('discussion_topic/topic', array('discussion_topic' => $discussion_topic, "helper" => $helper)) ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
<?php if ($pager->haveToPaginate()): ?>
    <div id="discussion_topics_footer">
        <?php include_partial('discussion_topic/pagination', array('pager' => $pager)) ?>
    </div>
<?php endif; ?>