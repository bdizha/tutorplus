<?php foreach ($discussionComments as $discussionComment): ?>
    <?php include_partial("discussion_comment/comment", array("discussionComment" => $discussionComment)) ?>
<?php endforeach; ?>