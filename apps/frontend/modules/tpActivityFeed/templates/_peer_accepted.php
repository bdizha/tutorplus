<?php use_helper('I18N', 'Date') ?>
<?php $peer = Doctrine_Core::getTable('Peer')->findOneById($activityFeed->getItemId()) ?>
<?php if ($peer): ?>
    <div class="timeline-row">
        <div class="heading">
            <?php $otherPeer = ($sf_user->getId() == $peer->getInviterId()) ? $peer->getInvitee() : $peer->getInviter() ?>
            <?php include_partial('tpPersonalInfo/photo', array('profile' => $otherPeer, "dimension" => 36)) ?>
            <?php if ($sf_user->getId() == $peer->getInviterId()): ?>
                <?php echo link_to($otherPeer, 'profile_show', $otherPeer) ?> has accepted your peer request
            <?php else: ?>
                You and <?php echo link_to($peer->getInviter(), 'profile_show', $peer->getInviter()) ?> are now peers
            <?php endif ?> -
            <span class="datetime"><?php echo myToolkit::dateInWords($activityFeed->getCreatedAt()) ?></span>
        </div>
    </div>
<?php endif; ?>