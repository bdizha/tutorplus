<?php if (count($peers) == 0): ?>
    <div class="no-result no-padding">There's no peers linked currently.</div>
<?php endif; ?>
<?php if (!isset($isFinding)): ?>
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
            <?php include_partial('personal_info/photo', array('user' => $myPeer, "dimension" => 48)) ?>
            <div class="name"><?php echo link_to($myPeer->getName(), 'profile_show', $myPeer) ?></div>
            <div class="peer-actions">
                <input type="button" class="peer-<?php echo $statusClass ?>" inviterid="<?php echo $myPeer->getId() ?>" value="<?php echo $statusLabel ?>">
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <?php foreach ($peers as $myPeer): ?>
        <?php $statusLabel = "+ Request"; ?>
        <?php $statusClass = "open"; ?>
        <div class="peer"> 
            <?php include_partial('personal_info/photo', array('user' => $myPeer, "dimension" => 48)) ?>
            <div class="name"><?php echo link_to($myPeer->getName(), 'profile_show', $myPeer) ?></div>
            <div class="peer-actions">
                <input type="button" class="peer-<?php echo $statusClass ?>" inviteeid="<?php echo $myPeer->getId() ?>" value="<?php echo $statusLabel ?>">
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){
        $(".peer-accept").live("click", function(){
            var inviterId = $(this).attr("inviterid");
            $(this).addClass("peer-peered");
            $(this).removeClass("peer-accept");
            $(this).attr("value", "Peered");
            $.get('/peer/accept/' + inviterId, {}, function(response){
                if(response == "success"){
                    // display a notice
                }
            }, 'html'); 
        });
        
        $(".peer-open").live("click", function(){
            var inviteeId = $(this).attr("inviteeid");
            $(this).addClass("peer-invited");
            $(this).removeClass("peer-open");
            $(this).attr("value", "? Invited");
            $.get('/peer/invite/' + inviteeId, {}, function(response){
                if(response == "success"){
                    // display a notice
                }
            }, 'html'); 
        });
    });
    //]]
</script>