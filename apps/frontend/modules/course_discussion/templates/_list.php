<?php if (!$pager->getNbResults()): ?>
    <div class="no-result"><?php echo __("There isn't any discussions started yet.", array(), 'sf_admin') ?></div>
<?php else: ?>  
    <div id="DiscussionGroups">
        <?php foreach ($pager->getResults() as $i => $discussionGroup): $odd = fmod(++$i, 2) ? 'odd' : 'even' ?>
            <div class="snapshot discussion_group"><?php include_partial('course_discussion/discussion_group', array('discussionGroup' => $discussionGroup, "helper" => $helper)) ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>