<div id="Discussions">
    <?php foreach ($courseDiscussions as $courseDiscussion): ?>
        <div class="snapshot discussion"><?php include_partial('tpDiscussion/discussion', array('discussion' => $courseDiscussion, "helper" => $helper)) ?></div>
    <?php endforeach; ?>
</div>