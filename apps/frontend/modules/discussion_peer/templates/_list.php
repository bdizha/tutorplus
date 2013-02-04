<?php if ($discussionPeers->count() > 0): ?>
    <?php foreach ($discussionPeers as $discussionPeer): ?>
        <?php include_partial('discussion_peer/peer', array('peer' => $discussionPeer)) ?>
    <?php endforeach; ?>
<?php else: ?>
    There isn't any discussion peers yet.
<?php endif; ?>