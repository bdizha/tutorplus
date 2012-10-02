<?php foreach ($peers as $key => $peer): ?>
    <?php if ($peer->getInviteeId() == $sf_user->getId()): ?>
        <?php $myPeer = $peer->getInviter(); ?>
        <?php if ($peer->getStatus() == PeerTable::STATUS_INVITED): ?>
            <?php $statusLabel = "+ Accept"; ?>
            <?php $statusClass = "accept"; ?>
        <?php else: ?>
            <?php $statusLabel = PeerTable::$statuses[$peer->getStatus()]; ?>
            <?php $statusClass = strtolower(PeerTable::$statuses[$peer->getStatus()]); ?>
        <?php endif; ?>
    <?php else: ?>
        <?php if ($peer->getStatus() == PeerTable::STATUS_INVITED): ?>
            <?php $statusLabel = "? Invited"; ?>
            <?php $statusClass = "invited"; ?>
        <?php else: ?>
            <?php $statusLabel = PeerTable::$statuses[$peer->getStatus()]; ?>
            <?php $statusClass = strtolower(PeerTable::$statuses[$peer->getStatus()]); ?>
        <?php endif; ?>
        <?php $myPeer = $peer->getInvitee(); ?>
    <?php endif; ?>
    <div class="peer"> 
        <a class="image" href="/backend.php/profile">
            <?php include_partial('personal_info/photo', array('user' => $myPeer, "dimension" => 48)) ?>
        </a>
        <div class="name"><?php echo $myPeer ?></div>
        <div class="peer-actions">
            <input type="button" class="peer-<?php echo $statusClass ?>" inviterid="<?php echo $myPeer->getId() ?>" value="<?php echo $statusLabel ?>">
        </div>
    </div>
<?php endforeach; ?>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){
        $(".peer-accept").live("click", function(){
            var inviterId = $(this).attr("inviterid");
            $(this).addClass("peer-peered");
            $(this).removeClass("peer-accept");
            $(this).attr("value", "Peered");
            $.get('/backend.php/peer_accept/' + inviterId, {}, function(response){   
                if(response == "success"){
                }
            }, 'html'); 
        });
    });
    //]]
</script>