<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getLinks()) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->getBreadcrumbs()) ?>
<div id="sf_admin_content">
    <?php include_partial('tpCommon/flashes_normal') ?>
    <div class="content-block">
        <?php include_partial('tpCommon/tabs', $helper->getTabs("index", $indexActivityFeeds, $discussionActivityFeeds, $topicActivityFeeds, $postActivityFeeds)) ?>
        <div class="tab-block" id="activity_feeds">
            <?php foreach ($indexActivityFeeds as $key => $activityFeed): ?>
                <?php include_partial('tpActivityFeed/activity_feed', array('activityFeed' => $activityFeed)) ?>
            <?php endforeach; ?>
        </div>
    </div>  
</div>