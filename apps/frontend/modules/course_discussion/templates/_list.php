<?php if (!$courseDiscussionGroups->count()): ?>
    <div class="no-result"><?php echo __("There isn't any discussions started yet.", array(), 'sf_admin') ?></div>
<?php else: ?>  
    <div id="DiscussionGroups">
        <?php foreach ($courseDiscussionGroups as $courseDiscussionGroup): ?>
            <div class="snapshot discussion_group"><?php include_partial('course_discussion/discussion_group', array('courseDiscussionGroup' => $courseDiscussionGroup, "helper" => $helper)) ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>