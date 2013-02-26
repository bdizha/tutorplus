<?php foreach ($peers as $peer): ?>
<?php $profile = ($peer->getInviteeId() == $sf_user->getId()) ? $peer->getInviter() : $peer->getInvitee(); ?>
<div class="suggested-peer" id="peer-<?php echo $peer->getId() ?>">
	<?php include_partial('personal_info/photo', array('profile' => $profile, "dimension" => 24)) ?>
	<div class="button-box-accept button-box">
		<input type="button" class="peer-accept"
			peerid="<?php echo $peer->getId() ?>"
			inviterid="<?php echo $peer->getInviterId() ?>"
			inviteeid="<?php echo $peer->getInviteeId() ?>" value="+ Accept"></input>
	</div>
	<div class="button-box-decline button-box">
		<input type="button" class="peer-decline"
			peerid="<?php echo $peer->getId() ?>" title="Decline"
			inviterid="<?php echo $peer->getInviterId() ?>"
			inviteeid="<?php echo $peer->getInviteeId() ?>" value="x"></input>
	</div>
</div>
<?php endforeach; ?>