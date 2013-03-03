<?php use_helper('I18N', 'Date') ?>
<?php if ($course): ?>
    <?php include_component('common', 'secureMenu', $helper->getCourseLinks()) ?>
    <?php include_partial('common/breadcrumbs', $helper->getCourseBreadcrumbs()) ?>
<?php else: ?>
    <?php include_component('common', 'secureMenu', $helper->getDiscussionGroupLinks()) ?>
    <?php include_partial('common/breadcrumbs', $helper->getDiscussionGroupBreadcrumbs()) ?>
<?php endif; ?>
<div class="sf_admin_heading">
    <h3>
        Group ~
        <?php echo $discussionGroup->getName() ?>
    </h3>
</div>
<?php include_partial('common/flashes_normal') ?>
<div id="sf_admin_content">
    <div class="content-block">
        <?php include_partial('common/tabs', array('tabs' => $helper->getTabs($discussionGroup, $myPeers, "index"))) ?>
        <div class="tab-block">
            <?php include_partial('common/actions', array('actions' => $helper->getIndexActions($discussionGroup, $discussionPeer, $discussionGroup->hasProfile($sf_user->getId())))) ?>
            <?php include_partial('discussion_peer/list', array('discussionPeers' => $discussionPeers)) ?>
        </div>
    </div>
</div>
