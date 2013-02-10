<?php if (!$discussionGroups->count()): ?>
    <div class="no-result"><?php echo __("There isn't any groups started currently.", array(), 'sf_admin') ?></div>
<?php else: ?>  
    <?php foreach ($discussionGroups as $discussionGroup): ?>
        <?php include_partial('discussion_group/group', array('discussionGroup' => $discussionGroup, "helper" => $helper)) ?>
    <?php endforeach; ?>
<?php endif; ?>