<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->getAllLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->getIndexBreadcrumbs()) ?>
<div id="sf_admin_content">
    <?php include_partial('common/flashes_normal') ?>
    <div class="content-block">
        <?php include_partial('common/tabs', array('tabs' => $helper->getTabs("topics", $indexActivityFeeds, $groupActivityFeeds, $topicActivityFeeds, $postActivityFeeds))) ?>
        <div class="tab-block">
            <?php foreach ($topicActivityFeeds as $key => $activityFeed): ?>
                <?php include_partial('activity_feed/topic', array('activityFeed' => $activityFeed)) ?>
            <?php endforeach; ?>
        </div>
    </div>  
</div>