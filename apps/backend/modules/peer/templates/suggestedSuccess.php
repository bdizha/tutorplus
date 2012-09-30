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
        <?php if (count($peers) == 0): ?>
            <div class="no-result">There's no suggested peers linked currently.</div>
            <?php include_partial('common/content_actions', array('actions' => $helper->findPeersContentActions())) ?>
        <?php else: ?>      
            <div class="peer-block plain-row padding-10" id="my_peers">
                <?php include_partial('list', array("peers" => array())) ?>
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