<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->allLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->getPostsBreadcrumbs()) ?>
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
        <?php include_partial('common/tabs', array('tabs' => $helper->getTabs("posts", $profile, $showActivityFeeds, $groupActivityFeeds, $topicActivityFeeds, $postActivityFeeds))) ?>
        <div class="tab-block">
            <div class="content-block" id="timeline">
                <div id="discussion_post_form_container">
                    <?php include_partial('discussion_post/form', array('discussion_post' => new DiscussionPost(), 'form' => $discussionPostForm)) ?>
                </div>
                <div id="discussion-comments">
                    <?php foreach ($postActivityFeeds as $key => $activityFeed): ?>
                        <?php include_partial('activity_feed/post', array('activityFeed' => $activityFeed, "discussionCommentForm" => $discussionCommentForm)) ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>  
</div>
<?php include_partial('discussion_comment/js') ?>