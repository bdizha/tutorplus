<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getLinks()) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->getBreadcrumbs("discussion_peers", "Peers", "/discussion/peer", $discussion)) ?>
<?php include_partial('tpCommon/flashes_normal') ?>
<div id="sf_admin_content">
    <div class="content-block">
        <?php include_partial('tpCommon/tabs', array('tabs' => $helper->getTabs($discussion, $myPeers, "peers", $discussionPeer, $discussion->hasProfile($sf_user->getId())))) ?>
        <div class="tab-block">
            <?php include_partial('tpCommon/actions', array('actions' => $helper->getActions($discussionPeer, $discussion->hasProfile($sf_user->getId())))) ?>
            <?php include_partial('tpDiscussion_peer/list', array('discussionPeers' => $discussionPeers)) ?>
        </div>
    </div>
</div>
