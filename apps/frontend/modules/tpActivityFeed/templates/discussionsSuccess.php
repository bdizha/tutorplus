<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getLinks()) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->getBreadcrumbs("Discussions", "timeline/discussions")) ?>
<div id="sf_admin_content">
    <?php include_partial('tpCommon/flashes_normal') ?>
    <div class="content-block">
        <?php include_partial('tpCommon/tabs', $helper->getTabs("discussions", $indexActivityFeeds, $discussionActivityFeeds, $topicActivityFeeds, $postActivityFeeds)) ?>
        <div class="tab-block">
            <?php foreach ($discussionActivityFeeds as $key => $activityFeed): ?>
                <?php include_partial('tpActivityFeed/discussion', array('activityFeed' => $activityFeed)) ?>
            <?php endforeach; ?>
        </div>
    </div>  
</div>