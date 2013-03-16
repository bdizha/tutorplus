<?php if (count($peers) == 0): ?>
There isn't any peers that are currently linked to your profile.
<?php endif; ?>
<?php if (!isset($isFinding)): ?>
<?php foreach ($peers as $key => $peer): ?>
<?php if ($peer->getInviteeId() == $sf_user->getId()): ?>
<?php $myPeer = $peer->getInviter(); ?>
<?php if ($peer->getStatus() == PeerTable::STATUS_REQUESTED): ?>
<?php $statusLabel = "+ Accept"; ?>
<?php $statusClass = "accept"; ?>
<?php elseif ($peer->getStatus() == PeerTable::STATUS_SUGGESTED): ?>
<?php $statusLabel = "+ Request"; ?>
<?php $statusClass = "open"; ?>
<?php else: ?>
<?php $statusLabel = PeerTable::$labels[$peer->getStatus()]; ?>
<?php $statusClass = strtolower(PeerTable::$statuses[$peer->getStatus()]); ?>
<?php endif; ?>
<?php else: ?>
<?php $myPeer = $peer->getInvitee(); ?>
<?php if ($peer->getStatus() == PeerTable::STATUS_REQUESTED): ?>
<?php $statusLabel = "Invited"; ?>
<?php $statusClass = "invited"; ?>
<?php elseif ($peer->getStatus() == PeerTable::STATUS_SUGGESTED): ?>
<?php $statusLabel = "+ Request"; ?>
<?php $statusClass = "open"; ?>
<?php else: ?>
<?php $statusLabel = PeerTable::$labels[$peer->getStatus()]; ?>
<?php $statusClass = strtolower(PeerTable::$statuses[$peer->getStatus()]); ?>
<?php endif; ?>
<?php endif; ?>
<div class="peer<?php echo fmod($key, 2) ? " last" : "" ?>">
	<?php include_partial('tpPersonalInfo/photo', array('profile' => $myPeer, "dimension" => 36)) ?>
	<div class="name">
		<?php echo link_to($myPeer->getName(), 'profile_show', $myPeer) ?>
	</div>
	<div class="institution">
		<?php echo $myPeer->getInstitution() ?>
	</div>
	<div class="peer-actions">
		<div class="button-box-<?php echo $statusClass ?>">
			<input type="button" class="peer-<?php echo $statusClass ?>"
				inviterid="<?php echo $peer->getInviterId() ?>"
				inviteeid="<?php echo $peer->getInviteeId() ?>"
				value="<?php echo $statusLabel ?>">
		</div>
	</div>
</div>
<?php endforeach; ?>
<?php else: ?>
<?php foreach ($peers as $key => $myPeer): ?>
<?php $statusLabel = "+ Request"; ?>
<?php $statusClass = "open"; ?>
<div class="peer<?php echo fmod($key, 2) ? " last" : "" ?>">
	<?php include_partial('tpPersonalInfo/photo', array('profile' => $myPeer, "dimension" => 36)) ?>
	<div class="name">
		<?php echo link_to($myPeer->getName(), 'profile_show', $myPeer) ?>
	</div>
	<div class="peer-actions">
		<div class="button-box-<?php echo $statusClass ?>">
			<input type="button" class="peer-<?php echo $statusClass ?>"
				inviterid="<?php echo $sf_user->getId() ?>"
				inviteeid="<?php echo $myPeer->getId() ?>"
				value="<?php echo $statusLabel ?>">
		</div>
	</div>
</div>
<?php endforeach; ?>
<?php endif; ?>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){
        $(".peer-accept").live("click",function(){
            var inviterId = $(this).attr("inviterid");
            $(this).addClass("peer-peered");
            $(this).removeClass("peer-accept");

            $(this).parent().removeClass("button-box-accept");
            $(this).parent().addClass("button-box-peered");
            
            $(this).attr("value","Peers");
            $.get('/peer/accept/' + inviterId, {}, function(response){
            	if (response.status == "success") {
                	showSuccess(response.notice);
            	}
                else{
                	showFailure(response.notice);
                }
            },'json');
        });

        $(".peer-open").live("click",function(){
            var inviterId = $(this).attr("inviterid");
            var inviteeId = $(this).attr("inviteeid");
            $(this).removeClass("peer-open");
            $(this).addClass("peer-invited");

            $(this).parent().removeClass("button-box-open");
            $(this).parent().addClass("button-box-invited");

            $(this).attr("value","Invited");
            $.get('/peer/invite/' + inviterId + '/' + inviteeId, {}, function(response){
            	if (response.status == "success") {
                	showSuccess(response.notice);
            	}
                else{
                	showFailure(response.notice);
                }
            },'json');
        });
    });
    //]]
</script>
