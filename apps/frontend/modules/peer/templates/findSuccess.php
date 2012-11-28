<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->findLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->findBreadcrumbs()) ?>
<?php end_slot() ?>

<div id="sf_admin_heading">
    <h3>Find Peers</h3>
</div>
<div id="sf_admin_content">
    <div class="content-block">
        <?php if (count($potentialPeers) == 0): ?>
            <h2>It seems there's no new peers in this platform who're available to peer up with you currently.</h2>
        <?php else: ?>    
            <h2>Get peered up! You may want to use their name to quickly find them below :)</h2>  
            <div class="peer-block plain-row padding-10" id="my_peers">
                <?php include_partial('peer/list', array("peers" => $potentialPeers, "isFinding" => true)) ?>
            </div> 
        <?php endif; ?>
    </div>
</div>