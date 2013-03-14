<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->allLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->suggestedBreadcrumbs()) ?>
<div id="sf_admin_content">
    <?php include_partial('common/flashes_normal') ?>
    <div class="content-block">
        <?php include_partial('common/tabs', $helper->getTabs("invitations", $studentPeers, $instructorPeers, $suggestedPeers, $requestingPeers, $invitedPeers)) ?>
        <div class="tab-block">
            <?php if ($invitedPeers->count() == 0): ?>
                <div>There isn't any pending peer invitations currently.</div>
                <?php include_partial('common/actions', $helper->findPeers()) ?>
            <?php else: ?>
                <?php include_partial('list', array("peers" => $invitedPeers)) ?>
            <?php endif; ?>
        </div>
    </div>
</div>