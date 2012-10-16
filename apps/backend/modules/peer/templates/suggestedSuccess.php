<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->suggestedLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->suggestedBreadcrumbs()) ?>
<?php end_slot() ?>

<div id="sf_admin_heading">
    <h3>Suggested Peers</h3>
</div>
<div id="sf_admin_content">
    <div class="content-block">
        <?php if (count($suggestedPeers) == 0): ?>
            <h2>Oops, there's no suggested peers available currently.</h2>
            <div class="no-result">It seems you're probably new in this platform or you haven't been engaged in any interaction yet :)</div>
            <?php include_partial('common/content_actions', array('actions' => $helper->findPeersContentActions())) ?>
        <?php else: ?>
            <h2>These are all your current suggested peers you're linked up with below.</h2>
            <div class="peer-block plain-row padding-10" id="my_peers">
                <?php include_partial('list', array("peers" => $suggestedPeers)) ?>
            </div> 
        <?php endif; ?>
    </div>
</div>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){
    });
    //]]
</script>