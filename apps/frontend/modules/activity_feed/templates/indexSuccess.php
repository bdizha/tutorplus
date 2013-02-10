<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->getAllLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->getIndexBreadcrumbs()) ?>
<div class="sf_admin_heading">
    <h3>Timeline ~ <?php echo date("M, j Y", strtotime($sf_user->getProfile()->getCreatedAt())) ?> to this day</h3>
</div>
<div id="sf_admin_content">
    <?php include_partial('common/flashes_normal') ?>
    <div class="content-block">
        <?php include_partial('common/tabs', array('tabs' => $helper->getTabs("index", $indexActivityFeeds, $groupActivityFeeds, $topicActivityFeeds, $postActivityFeeds))) ?>
        <div class="tab-block" id="activity_feeds">
            <?php foreach ($indexActivityFeeds as $key => $activityFeed): ?>
                <?php include_partial('activity_feed/activity_feed', array('activityFeed' => $activityFeed)) ?>
            <?php endforeach; ?>
        </div>
    </div>  
</div>