<?php if (count($suggestedPeers) > 0): ?>
    <?php foreach ($suggestedPeers as $suggestedPeer): ?>
        <div class="follower"> 
            <?php include_partial('personal_info/photo', array('profile' => $suggestedPeer, "dimension" => 48)) ?>
            <div class="name"><?php echo link_to($suggestedPeer->getName(), 'profile_show', $suggestedPeer) ?></div>
            <div class="button-box-blue">
                <input class="invite" ProfileId="<?php echo $suggestedPeer->getId() ?>" value="+ Invite" type="button"/>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="no-result">There's no suggested followers.</div>
<?php endif; ?>

<script type='text/javascript'>
    $(document).ready(function(){
        $(".peer-actions .invite").click(function(){
            var ProfileId = $(this).attr("ProfileId");
            $.get('/discussion/peer/accept/' + ProfileId, {}, function (response) {
                $("#acceptance-notice").html(response);
                $(".notice").hide();
                $("#acceptance-notice").show();
                 setTimeout(function(){
                    $(".notice").hide();
                },3000);
                $("#suggested-followers").load("/discussion/peer/suggested");
            }, 'html');
        });
    });    
</script>
