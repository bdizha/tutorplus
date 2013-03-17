<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getLinks($discussion_peer)) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->getBreadcrumbs("peer_edit", "Edit Membership", "/discussion/peer/new", $discussion)) ?>
<?php include_partial('tpCommon/flashes_normal') ?>
<div id="sf_admin_content">
    <div class="content-block">
        <?php include_partial('tpCommon/tabs', array('tabs' => $helper->getTabs($discussion, $myPeers, "peer_edit", $discussion_peer, true))) ?>
        <div class="tab-block">
            <div id="sf_admin_form_container">	
                <?php include_partial('tpDiscussionPeer/form', array('discussion_peer' => $discussion_peer, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>	
                <div id="sf_admin_footer">
                    <?php include_partial('tpDiscussionPeer/form_footer', array('discussion_peer' => $discussion_peer, 'form' => $form, 'configuration' => $configuration)) ?>
                </div>
            </div>
        </div>
    </div>
</div>