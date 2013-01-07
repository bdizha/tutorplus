<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->suggestedLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->suggestedBreadcrumbs()) ?>
<?php end_slot() ?>

<div id="sf_admin_content">
    <div class="content-block">
        <div class="peer-filters">
            <ul class="nav-tabs">
                <li class="active-tab">
                    <a href="#" tab="suggested_peers" class="tab-title">Suggested Peers</a>
                    <span class="list-count"><?php echo count($suggestedPeers) ?></span>
                </li>
            </ul>
        </div>
        <?php if (count($suggestedPeers) == 0): ?>
            <div class="no-result peer-block">It seems you're probably new in this platform or you haven't been engaged in any interaction yet :)</div>
            <?php include_partial('common/actions', array('actions' => $helper->findPeers())) ?>
        <?php else: ?>
            <div class="peer-block padding-10" id="my_peers">
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