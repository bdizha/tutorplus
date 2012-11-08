<?php $discussionMembers = $discussion->retrieveMembers(); ?>
<?php if ($discussionMembers->count() > 0): ?>
    <?php foreach ($discussionMembers as $discussionMember): ?>
        <?php include_partial('discussion_member/member', array('member' => $discussionMember)) ?>
    <?php endforeach; ?>
<?php else: ?>
    <div class="no-result">Currently there're no discussion participants.</div>
<?php endif; ?>