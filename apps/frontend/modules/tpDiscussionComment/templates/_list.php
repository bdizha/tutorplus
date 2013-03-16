<?php foreach ($discussionComments as $discussionComment): ?>
    <?php include_partial("tpDiscussionComment/comment", array("discussionComment" => $discussionComment)) ?>
<?php endforeach; ?>