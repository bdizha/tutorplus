<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getLinks()) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->getDiscussionsBreadcrumbs()) ?>
<div id="sf_admin_heading">
    <h3><?php echo $profile->getTitle() . " " . $profile->getName() ?></h3>
</div>
<div id="sf_admin_content">
    <?php include_partial('tpCommon/flashes_normal') ?>
    <div class="content-block">
        <h2>Profile info <span class="actions"> <?php if ($sf_user->isCurrent($profile->getId())): ?><span class="actions"><?php echo link_to(__("Edit"), "@profile_edit?id=" . $profile->getId(), array("id" => "edit_profile_info")) ?></span><?php endif; ?></h2>
        <div class="full-block">
            <?php include_partial('tpProfile/info', array('profile' => $profile)) ?>
        </div>
    </div>
    <div class="content-block">
        <?php include_partial('tpCommon/tabs', $helper->getTabs("peers", $profile, $activityFeeds, $groupActivityFeeds, $topicActivityFeeds, $postActivityFeeds, $peers)) ?>
        <div class="tab-block">
            <?php if ($peers->count() == 0): ?>
                <div>You currently don't have any peers.</div>
            <?php else: ?>
                <?php include_partial('tpPeer/list', array("peers" => $peers)) ?>
            <?php endif; ?>
        </div>
    </div>  
</div>