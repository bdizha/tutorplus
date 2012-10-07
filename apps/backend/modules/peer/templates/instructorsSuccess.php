<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->instructorsLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->instructorsBreadcrumbs()) ?>
<?php end_slot() ?>

<div id="sf_admin_heading">
    <h3>Instructor Peers</h3>
</div>
<div id="sf_admin_content">
    <div class="content-block">
        <?php if (count($instructorPeers) == 0): ?>
            <h2>It seems you're probably new in this platform or you haven't linked up with any instructor peers yet. You may want to do so below!</h2>
            <div class="no-result">There's no instructor peers linked currently.</div>
            <?php include_partial('common/content_actions', array('actions' => $helper->findPeersContentActions())) ?>
        <?php else: ?>    
            <h2>These are all your current instructor peers you're linked up with below.</h2>  
            <div class="peer-block plain-row padding-10" id="my_peers">
                <?php include_partial('list', array("peers" => $instructorPeers)) ?>
            </div> 
        <?php endif; ?>
    </div>
</div>