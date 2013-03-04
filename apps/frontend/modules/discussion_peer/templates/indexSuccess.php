<?php use_helper('I18N', 'Date') ?>
<?php if ($course): ?>
    <?php include_component('common', 'secureMenu', $helper->getCourseLinks()) ?>
    <?php include_partial('common/breadcrumbs', $helper->getCourseBreadcrumbs()) ?>
<?php else: ?>
    <?php include_component('common', 'secureMenu', $helper->getDiscussionLinks()) ?>
    <?php include_partial('common/breadcrumbs', $helper->getDiscussionBreadcrumbs()) ?>
<?php endif; ?>
<div class="sf_admin_heading">
    <h3>Discussion ~ <?php echo $discussion->getName() ?></h3>
</div>
<?php include_partial('common/flashes_normal') ?>
<div id="sf_admin_content">
    <div class="content-block">
        <?php include_partial('common/tabs', array('tabs' => $helper->getTabs($discussion, $myPeers, "index"))) ?>
        <div class="tab-block">
            <?php include_partial('common/actions', array('actions' => $helper->getIndexActions($discussion, $discussionPeer, $discussion->hasProfile($sf_user->getId())))) ?>
            <?php include_partial('discussion_peer/list', array('discussionPeers' => $discussionPeers)) ?>
        </div>
    </div>
</div>
