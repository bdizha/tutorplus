<?php use_helper('I18N', 'Date') ?>
<?php if ($course): ?>
    <?php include_component('common', 'secureMenu', $helper->getCourseLinks()) ?>
    <?php include_partial('common/breadcrumbs', $helper->getCourseBreadcrumbs()) ?>
<?php else: ?>
    <?php include_component('common', 'secureMenu', $helper->getDiscussionGroupLinks()) ?>
    <?php include_partial('common/breadcrumbs', $helper->getDiscussionGroupBreadcrumbs()) ?>
<?php endif; ?>
<div class="sf_admin_heading">
    <h3>Group ~ <?php echo $discussionGroup->getName() ?></h3>
</div>
<div id="sf_admin_content">
    <?php include_partial('common/flashes_normal') ?>
    <div class="content-block">
        <?php include_partial('common/tabs', array('tabs' => $helper->getIndexTabs($discussionGroup, $myPeers))) ?>
        <div class="tab-block" id="my_peers">
            <div id="discussion_group">
                <div class="snapshot">
                    <?php include_partial('personal_info/photo', array('profile' => $discussionGroup->getProfile(), "dimension" => 36)) ?>
                    <div class="body">
                        <?php echo $discussionGroup->getDescription() ?>
                        <div class="user-meta">Started by <?php echo link_to($discussionGroup->getProfile(), 'profile_show', $discussionGroup->getProfile()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($discussionGroup->getCreatedAt()) ?></span></div>
                    </div>
                    <div class="statistics">
                        <span class="list-count"><?php echo $discussionGroup->getTopics()->count() ?></span> topics 
                        <span class="list-count"><?php echo $discussionGroup->getPostCount() ?></span> posts 
                        <span class="list-count"><?php echo $discussionGroup->getCommentCount() ?></span> comments
                        <span class="list-count"><?php echo $discussionGroup->getViewCount() ?></span> views
                        <span class="list-count"><?php echo $discussionGroup->getPeers()->count() ?></span> peers
                    </div>
                </div>
            </div>
            <?php include_partial('common/actions', array('actions' => $helper->getIndexActions($discussionGroup, $discussionPeer, $discussionGroup->hasProfile($sf_user->getId())))) ?>
            <?php include_partial('discussion_peer/list', array('discussionPeers' => $discussionPeers)) ?>
        </div>
    </div>
</div>
<?php include_partial('discussion_group/js', array("helper" => $helper)) ?>