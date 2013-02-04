<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->allLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->suggestedBreadcrumbs()) ?>
<div class="sf_admin_heading">
    <h3><?php echo __('Peers') ?></h3>
</div>
<div id="sf_admin_content">
    <?php include_partial('common/flashes_normal') ?>
    <div class="content-block">
        <?php include_partial('common/tabs', array('tabs' => $helper->getAllTabs("suggested", $studentPeers, $instructorPeers, $suggestedPeers, $requestingPeers))) ?>
        <div class="tab-block">
            <?php if ($suggestedPeers->count() == 0): ?>
                <div>There isn't any suggested peers currently.</div>
                <?php include_partial('common/actions', $helper->findPeers()) ?>
            <?php else: ?>
                <?php include_partial('list', array("peers" => $suggestedPeers)) ?>
            <?php endif; ?>
        </div>
    </div>
</div>