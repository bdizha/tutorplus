<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->allLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->getShowBreadcrumbs()) ?>
<div id="sf_admin_heading">
    <h3><?php echo $profile->getTitle() . " " . $profile->getName() ?></h3>
</div>
<div id="sf_admin_content">
    <?php include_partial('common/flashes_normal') ?>
    <div class="content-block">
        <h2>Profile info <span class="actions"> <?php if ($sf_user->isCurrent($profile->getId())): ?><span class="actions"><?php echo link_to(__("Edit"), "@profile_info_edit?id=" . $profile->getId(), array("id" => "edit_profile_info")) ?></span><?php endif; ?></h2>
        <div class="full-block">
            <?php include_partial('profile/info', array('profile' => $profile)) ?>
        </div>
    </div>
    <div class="content-block">
        <?php include_partial('common/tabs', array('tabs' => $helper->getAllTabs("show", $profile, $showActivityFeeds, $groupActivityFeeds, $topicActivityFeeds, $postActivityFeeds))) ?>
        <div class="tab-block">
            <?php foreach ($showActivityFeeds as $key => $activityFeed): ?>
                <?php include_partial('activity_feed/snapshot', array('activityFeed' => $activityFeed)) ?>
            <?php endforeach; ?>
        </div>
    </div>  
</div>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){
        $("#edit_profile_info").click(function(){
            openPopup($(this).attr("href"),'410px',"600px","Edit Personal Info");
            return false;
        });
    });

    $("#upload_photo").click(function(){
        openPopup("/profile/upload/photo","600px","300px",$(this).attr("value"));
        return false;
    });

    $("#crop_photo").click(function(){
        openPopup("/profile/crop/photo","600px","600px",$(this).attr("value"));
        return false;
    });

    function fetchProfileInfos(){
        $('#profile_info').load('/profile/info/ajax');
    }
    //]]
</script>