<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->getLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->getBreadcrumbs("discussion_peers", "Peers", "/discussion/peer", $discussion)) ?>
<?php include_partial('common/flashes_normal') ?>
<div id="sf_admin_content">
    <div class="content-block">
        <?php include_partial('common/tabs', array('tabs' => $helper->getTabs($discussion, $myPeers, "peers", $discussionPeer, $discussion->hasProfile($sf_user->getId())))) ?>
        <div class="tab-block">
            <?php include_partial('common/actions', array('actions' => $helper->getActions($discussionPeer, $discussion->hasProfile($sf_user->getId())))) ?>
            <?php include_partial('discussion_peer/list', array('discussionPeers' => $discussionPeers)) ?>
        </div>
    </div>
</div>
