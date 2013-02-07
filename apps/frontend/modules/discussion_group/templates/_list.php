<?php if (!$pager->getNbResults()): ?>
    <div class="no-result"><?php echo __("There's no group started currently.", array(), 'sf_admin') ?></div>
<?php else: ?>  
    <?php foreach ($pager->getResults() as $i => $discussionGroup): $odd = fmod(++$i, 2) ? 'odd' : 'even' ?>
        <?php include_partial('discussion_group/group', array('discussionGroup' => $discussionGroup, "helper" => $helper)) ?>
    <?php endforeach; ?>
<?php endif; ?>