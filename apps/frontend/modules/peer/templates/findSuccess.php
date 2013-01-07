<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->findLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->findBreadcrumbs()) ?>
<?php end_slot() ?>

<div id="sf_admin_content">
    <div class="content-block">
        <ul class="nav-tabs">
            <li class="active-tab">
                <a href="#" tab="potential_peers" class="tab-title">Find Peers</a>
                <span class="list-count"><?php echo count($potentialPeers) ?></span>
            </li>
        </ul>
        <div class="peer-block  padding-10" id="my_peers">
            <?php if (count($potentialPeers) == 0): ?>
                <div class="tip">It seems there's no new peers in this platform who're available to peer up with you currently :)</div>
            <?php else: ?>    
                <div class="tip">Get peered up! You may want to use their name to quickly find them below :)</div>
                <?php include_partial('peer/list', array("peers" => $potentialPeers, "isFinding" => true)) ?>
            </div> 
        <?php endif; ?>
    </div>
</div>