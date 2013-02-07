<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->getAllLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->getIndexBreadcrumbs()) ?>
<div class="sf_admin_heading">
    <h3>Timeline ~ <?php echo date("M, j Y", strtotime($sf_user->getProfile()->getCreatedAt())) ?> to this day</h3>
</div>
<div id="sf_admin_content">
    <?php include_partial('common/flashes_normal') ?>
    <div class="content-block">
        <?php include_partial('common/tabs', array('tabs' => $helper->getAllTabs("groups", $indexActivityFeeds, $groupActivityFeeds, $topicActivityFeeds, $postActivityFeeds))) ?>
        <div class="tab-block">
            <?php foreach ($groupActivityFeeds as $key => $activityFeed): ?>
                <?php include_partial('activity_feed/group', array('activityFeed' => $activityFeed)) ?>
            <?php endforeach; ?>
        </div>
    </div>  
</div>