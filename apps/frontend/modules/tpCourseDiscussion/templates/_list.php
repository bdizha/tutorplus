<div id="Discussions">
    <?php foreach ($courseDiscussions as $courseDiscussion): ?>
        <div class="snapshot discussion"><?php include_partial('discussion/discussion', array('discussion' => $courseDiscussion, "helper" => $helper)) ?></div>
    <?php endforeach; ?>
</div>