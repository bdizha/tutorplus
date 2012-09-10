<div class="discussion-member" id="discussion-member-<?php echo $member->getId() ?>">
    <div class="member-image">
        <img alt="David Mpala" src="/uploads/users/6/avatar_36.png">
    </div>
    <div class="member-meta">
        <?php echo $member->getNickname() ?>
        <h4 class="discussion-access-level"><?php echo $member->getStatusDisplay() ?></h4>
    </div>
</div>