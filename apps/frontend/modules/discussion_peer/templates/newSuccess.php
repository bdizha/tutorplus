<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->getLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->getBreadcrumbs("peer_follow", "Follow Discussion", "/discussion/peer/new", $discussion)) ?>
<?php include_partial('common/flashes_normal') ?>
<div id="sf_admin_content">
    <div class="content-block">
        <?php include_partial('common/tabs', array('tabs' => $helper->getTabs($discussion, $myPeers, "peer_follow", $discussion_peer))) ?>
        <div class="tab-block">
            <div id="sf_admin_form_container">
               <?php include_partial('discussion_peer/form', array('discussion_peer' => $discussion_peer, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
                <div id="sf_admin_footer">
                    <?php include_partial('discussion_peer/form_footer', array('discussion_peer' => $discussion_peer, 'form' => $form, 'configuration' => $configuration)) ?>
                </div>
            </div>
        </div>
    </div>
</div>