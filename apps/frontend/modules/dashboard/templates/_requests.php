<?php foreach ($peers as $peer): ?>
    <?php $profile = ($peer->getInviteeId() == $sf_user->getId()) ? $peer->getInviter() : $peer->getInvitee(); ?>
    <div class="suggested-peer">
        <?php include_partial('personal_info/photo', array('profile' => $profile, "dimension" => 36)) ?>
        <div class="button-box-accept button-box">
            <input type="button" class="peer-accept" inviterid="<?php echo $peer->getInviterId() ?>" inviteeid="<?php echo $peer->getInviteeId() ?>" value="+ Accept">
        </div>  
    </div>
<?php endforeach; ?>
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
            $.get('/peer/accept/' + inviterId,{},function(response){
                if (response == "success") {
                    // display a notice
                }
            },'html');
        });
    });
    //]]
</script>