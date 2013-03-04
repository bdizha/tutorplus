<?php if (!$courseDiscussions->count()): ?>
    <div class="no-result"><?php echo __("There isn't any discussions started yet.", array(), 'sf_admin') ?></div>
<?php else: ?>  
    <div id="Discussions">
        <?php foreach ($courseDiscussions as $courseDiscussion): ?>
            <div class="snapshot discussion"><?php include_partial('course_discussion/discussion', array('courseDiscussion' => $courseDiscussion, "helper" => $helper)) ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>