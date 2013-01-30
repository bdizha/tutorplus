<?php $discussionGroupMembers = $discussionGroup->retrieveMembers(); ?>
<?php if ($discussionGroupMembers->count() > 0): ?>
    <?php foreach ($discussionGroupMembers as $discussionPeer): ?>
        <?php include_partial('discussion_peer/peer', array('peer' => $discussionPeer)) ?>
    <?php endforeach; ?>
<?php else: ?>
    <div class="no-result">There isn't any group peers currently.</div>
<?php endif; ?>