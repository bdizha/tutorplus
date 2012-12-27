<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->instructorsLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->instructorsBreadcrumbs()) ?>
<?php end_slot() ?>

<div id="sf_admin_content">
    <div class="content-block">
        <div class="peer-filters">
            <ul class="nav-tabs">
                <li class="active-tab">
                    <a href="#" tab="instructor_peers" class="tab-title">Instructor Peers</a>
                    <span class="list-count"><?php echo count($instructorPeers) ?></span>
                </li>
            </ul>
        </div>
        <?php if (count($instructorPeers) == 0): ?>
            <div class="no-result">There's no instructor peers linked currently.</div>
            <?php include_partial('common/actions', array('actions' => $helper->findPeersContentActions())) ?>
        <?php else: ?>
            <div class="peer-block  padding-10" id="my_peers">
                <?php include_partial('list', array("peers" => $instructorPeers)) ?>
            </div> 
        <?php endif; ?>
    </div>
</div>