<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getLinks()) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->getShowBreadcrumbs()) ?>
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
        <?php include_partial('tpCommon/tabs', array('tabs' => $helper->getTabs("posts", $profile, $activityFeeds, $groupActivityFeeds, $topicActivityFeeds, $postActivityFeeds))) ?>
        <div class="tab-block">
            <div class="content-block" id="timeline">
                <div id="discussion_post_form_container">
                    <?php include_partial('tpDiscussionPost/form', array('discussion_post' => new DiscussionPost(), 'form' => $discussionPostForm)) ?>
                </div>
                <div id="discussion-comments">
                    <?php foreach ($postActivityFeeds as $key => $activityFeed): ?>
                        <?php include_partial('tpActivityFeed/post', array('activityFeed' => $activityFeed, "discussionCommentForm" => $discussionCommentForm)) ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>  
</div>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){
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