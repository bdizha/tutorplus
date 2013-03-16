<?php use_helper('I18N', 'Date') ?>
<?php $peer = Doctrine_Core::getTable('Peer')->findOneById($activityFeed->getItemId()) ?>
<?php if ($peer): ?>
    <?php $invitee = $peer->getInviter() ?>
    <div class="timeline-row">
        <div class="heading">
            <?php include_partial('tpPersonalInfo/photo', array('profile' => $invitee, "dimension" => 36)) ?>
            <?php echo link_to($invitee, 'profile_show', $invitee) ?>  has requested you as a peer: 
            <?php echo link_to("here", 'peer_requests') ?> -
            <span class="datetime"><?php echo myToolkit::dateInWords($activityFeed->getCreatedAt()) ?></span>
        </div>
    </div>
<?php endif; ?>