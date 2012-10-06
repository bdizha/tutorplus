<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->studentsLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->studentsBreadcrumbs()) ?>
<?php end_slot() ?>

<div id="sf_admin_heading">
    <h3>Student Peers</h3>
</div>
<div id="sf_admin_content">
    <div class="content-block">
        <?php if (count($peers) == 0): ?>
            <div class="no-result">There's no student peers linked currently.</div>
            <?php include_partial('common/content_actions', array('actions' => $helper->findPeersContentActions())) ?>
        <?php else: ?>      
            <div class="peer-block plain-row padding-10" id="my_peers">
                <?php include_partial('list', array("peers" => $peers)) ?>
            </div> 
        <?php endif; ?>
    </div>
</div>