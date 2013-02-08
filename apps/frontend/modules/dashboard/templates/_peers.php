<?php foreach ($peers as $peer): ?>
<?php if ($peer->getInviteeId() == $sf_user->getId()): ?>
	<?php $myPeer = $peer->getInviter(); ?>
<?php else: ?>
	<?php $myPeer = $peer->getInvitee(); ?>
<?php endif; ?>
<?php include_partial('personal_info/photo', array('profile' => $myPeer, "dimension" => 36)) ?>
<?php endforeach; ?>