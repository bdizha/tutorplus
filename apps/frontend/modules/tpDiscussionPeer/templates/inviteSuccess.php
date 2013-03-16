<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getLinks()) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->getBreadcrumbs("discussion_peer_invite", "Invite Peers", "/discussion/peer/invite", $discussion)) ?>
<?php include_partial('tpCommon/flashes_normal') ?>
<div id="sf_admin_content">
    <div class="content-block">
        <?php include_partial('tpCommon/tabs', array('tabs' => $helper->getTabs($discussion, $myPeers, "peer_invite", $discussionPeer, $discussion->hasProfile($sf_user->getId())))) ?>
        <div class="tab-block">
            <div id="discussion_peer_invite_form_holder">
                <form id="discussion_peer_invite_form"
                      action="<?php echo url_for('@discussion_peer_invite') ?>"
                      method="post">
                          <?php include_partial('tpCommon/form_actions') ?>
                          <?php foreach ($myPeers as $peer): ?>
                              <?php if ($peer->getInviteeId() == $sf_user->getId()): ?>
                                  <?php $profile = $peer->getInviter(); ?>
                              <?php else: ?>
                                  <?php $profile = $peer->getInvitee(); ?>
                              <?php endif; ?>
                        <div class="peer">
                            <input type="checkbox" class="input-checkbox" name="peers[]"
                                   value="<?php echo $profile["id"] ?>"
                                   <?php echo (is_array($discussionPeerIds) && in_array($profile["id"], $discussionPeerIds)) ? "checked='checked'" : "" ?>
                                   id="peers_<?php echo $profile["id"] ?>" />
                            <div class="description">
                                <?php include_partial('tpPersonalInfo/photo', array('profile' => $profile, "dimension" => 36)) ?>
                                <div class="name">
                                    <?php echo $profile ?>
                                </div>
                                <div class="institution">
                                    <?php echo $profile->getInstitution() ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php include_partial('tpCommon/form_actions') ?>
                </form>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
    $(document).ready(function(){
        $(".cancel, .done").click(function(){
            loadUrl('<?php echo url_for('@discussion_peer') ?>');
        });
    });
</script>
