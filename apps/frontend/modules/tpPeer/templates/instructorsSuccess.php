<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getLinks()) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->instructorsBreadcrumbs()) ?>
<?php include_partial('tpCommon/flashes_normal') ?>
<div id="sf_admin_content">
    <div class="content-block">
        <?php include_partial('tpCommon/tabs', $helper->getTabs("instructors", $studentPeers, $instructorPeers, $suggestedPeers, $requestingPeers, $invitedPeers)) ?>
        <div class="tab-block">
            <?php if ($instructorPeers->count() == 0): ?>
                <div>You currently don't have any instructor peers.</div>
                <?php include_partial('tpCommon/actions', $helper->findPeers()) ?>
            <?php else: ?>
                <?php include_partial('list', array("peers" => $instructorPeers)) ?>
            <?php endif; ?>
        </div>
    </div>
</div>
