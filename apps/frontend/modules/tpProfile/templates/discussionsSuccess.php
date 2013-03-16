<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getLinks()) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->getDiscussionsBreadcrumbs()) ?>
<div id="sf_admin_heading">
    <h3><?php echo $profile->getTitle() . " " . $profile->getName() ?></h3>
</div>
<div id="sf_admin_content">
    <?php include_partial('tpCommon/flashes_normal') ?>
    <div class="content-block">
        <h2>Profile info <span class="actions"> <?php if ($sf_user->isCurrent($profile->getId())): ?><span class="actions"><?php echo link_to(__("Edit"), "@profile_info_edit?id=" . $profile->getId(), array("id" => "edit_profile_info")) ?></span><?php endif; ?></h2>
        <div class="full-block">
            <?php include_partial('tpProfile/info', array('profile' => $profile)) ?>
        </div>
    </div>
    <div class="content-block">
        <?php include_partial('tpCommon/tabs', array('tabs' => $helper->getTabs("discussions", $profile, $activityFeeds, $groupActivityFeeds, $topicActivityFeeds, $postActivityFeeds))) ?>
        <div class="tab-block">
            <?php foreach ($groupActivityFeeds as $key => $activityFeed): ?>
                <?php include_partial('tpActivityFeed/discussion', array('activityFeed' => $activityFeed)) ?>
            <?php endforeach; ?>
        </div>
    </div>  
</div>