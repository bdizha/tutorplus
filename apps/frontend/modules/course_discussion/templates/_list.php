<div id="Discussions">
    <?php foreach ($courseDiscussions as $courseDiscussion): ?>
        <div class="snapshot discussion"><?php include_partial('course_discussion/discussion', array('courseDiscussion' => $courseDiscussion, "helper" => $helper)) ?></div>
    <?php endforeach; ?>
</div>