<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->studentsLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->studentsBreadcrumbs()) ?>
<?php end_slot() ?>

<div id="sf_admin_content">
    <div class="content-block">
        <div class="peer-filters">
            <ul class="nav-tabs">
                <li class="active-tab">
                    <a href="#" tab="student_peers" class="tab-title">Student Peers</a>
                    <span class="list-count"><?php echo count($studentPeers) ?></span>
                </li>
            </ul>
        </div>
        <?php if (count($studentPeers) == 0): ?>
            <div class="no-result">There's no student peers linked currently.</div>
            <?php include_partial('common/content_actions', array('actions' => $helper->findPeersContentActions())) ?>
        <?php else: ?>
            <div class="peer-block plain-row padding-10" id="my_peers">
                <?php include_partial('list', array("peers" => $studentPeers)) ?>
            </div> 
        <?php endif; ?>
    </div>
</div>