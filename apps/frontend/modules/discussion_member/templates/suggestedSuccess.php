<?php if (count($suggestedFollowers) > 0): ?>
    <?php foreach ($suggestedFollowers as $suggestedFollower): ?>
        <div class="follower"> 
            <?php include_partial('personal_info/photo', array('user' => $suggestedFollower, "dimension" => 48)) ?>
            <div class="name"><?php echo link_to($suggestedFollower->getName(), 'profile_show', $suggestedFollower) ?></div>
            <div class="peer-actions">
                <input class="invite" userid="<?php echo $suggestedFollower->getId() ?>" value="Invite" type="button"/>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="no-result">There's no suggested followers.</div>
<?php endif; ?>

<script type='text/javascript'>
    $(document).ready(function(){
        $(".peer-actions .invite").click(function(){
            var userId = $(this).attr("userid");
            $.get('/discussion/member/accept/' + userId, {}, function (response) {
                $("#acceptance-notice").html(response);
                $(".notice").hide();
                $("#acceptance-notice").show();
                 setTimeout(function(){
                    $(".notice").hide();
                },3000);
                $("#suggested-followers").load("/discussion/member/suggested");
            }, 'html');
        });
    });    
</script>
