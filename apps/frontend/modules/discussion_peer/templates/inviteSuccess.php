<?php use_helper('I18N', 'Date') ?>
<div id="cboxLoadedContentInner">
    <div id="sf_admin_form_container">
        <div id="sf_admin_form_content">
            <div id="discussion_peer_invite_form_holder">
                <form id="discussion_peer_invite_form" action="<?php echo url_for('@discussion_peer_invite') ?>" method="post">
                    <fieldset id="sf_fieldset_none">             
                        <?php foreach ($discussionPeers as $peer): ?>
                            <?php if ($peer->getInviteeId() == $sf_user->getId()): ?>
                                <?php $profile = $peer->getInviter(); ?>
                            <?php else: ?>
                                <?php $profile = $peer->getInvitee(); ?>
                            <?php endif; ?>
                            <div class="peer">
                                <input type="checkbox" class="input-checkbox" name="peers[]" value="<?php echo $profile["id"] ?>" <?php echo (is_array($currentPeerIds) && in_array($profile["id"], $currentPeerIds)) ? "checked='checked'" : "" ?> id="peers_<?php echo $profile["id"] ?>" />
                                <div class="description">
                                    <?php include_partial('personal_info/photo', array('profile' => $profile, "dimension" => 36)) ?>
                                    <div class="name"><?php echo $profile ?></div>
                                    <div class="institution"><?php echo $profile->getInstitution() ?></div>
                                </div>
                            </div> 
                        <?php endforeach; ?>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="cboxLoadedActions">
    <?php include_partial('common/form_actions') ?>    
</div>
<script type='text/javascript'>
    $(document).ready(function(){
        $(".sf_admin_action_save .save").click(function(){
            $("#cboxLoadedContentInner").hide();
            $("#cboxLoadedContent").append(loadingHtml);
            $("#discussion_peer_invite_form").ajaxSubmit(function(data){
                $("#cboxLoadedContent").html(data);
                $.fn.colorbox.resize();
                
                // redirect the profile to discussion peers
                loadUrl('<?php echo url_for('@discussion_peer') ?>');
            });
            return false;
        });

        $(".cancel, .done").click(function(){
            // reload the current page
            $.fn.colorbox.close();
            return false;
        });
    });
</script>