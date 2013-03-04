<?php if (!$discussions->count()): ?>
    <div class="no-result"><?php echo __("There isn't any groups started currently.", array(), 'sf_admin') ?></div>
<?php else: ?>  
    <?php foreach ($discussions as $discussion): ?>
        <?php include_partial('discussion/group', array('discussionGroup' => $discussion, "helper" => $helper)) ?>
    <?php endforeach; ?>
<?php endif; ?>