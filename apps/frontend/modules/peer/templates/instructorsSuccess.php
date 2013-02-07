<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->allLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->instructorsBreadcrumbs()) ?>
<div class="sf_admin_heading">
    <h3><?php echo __('Peers') ?></h3>
</div>
<div id="sf_admin_content">
    <?php include_partial('common/flashes_normal') ?>
    <div class="content-block">
        <?php include_partial('common/tabs', array('tabs' => $helper->getAllTabs("instructors", $studentPeers, $instructorPeers, $suggestedPeers, $requestingPeers))) ?>
        <div class="tab-block">
            <?php if ($instructorPeers->count() == 0): ?>
                <div>You currently don't have any instructor peers.</div>
                <?php include_partial('common/actions', $helper->findPeers()) ?>
            <?php else: ?>
                <?php include_partial('list', array("peers" => $instructorPeers)) ?>
            <?php endif; ?>
        </div>
    </div>
</div>