<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->getAllLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->getIndexBreadcrumbs()) ?>
<div class="sf_admin_heading">
    <h3>Timeline ~ <?php echo date("M, j Y", strtotime($sf_user->getProfile()->getCreatedAt())) ?> to this day</h3>
</div>
<div id="sf_admin_content">
    <?php include_partial('common/flashes_normal') ?>
    <div class="content-block">
        <?php include_partial('common/tabs', array('tabs' => $helper->getAllTabs("posts", $indexActivityFeeds, $groupActivityFeeds, $topicActivityFeeds, $postActivityFeeds))) ?>
        <div class="tab-block">
            <div id="discussion_post_form_container">
                <?php include_partial('discussion_post/form', array('discussion_post' => new DiscussionPost(), 'form' => $discussionPostForm)) ?>
            </div>
            <div id="discussion-posts">
                <?php foreach ($postActivityFeeds as $key => $activityFeed): ?>
                    <?php include_partial('activity_feed/post', array('activityFeed' => $activityFeed, "discussionCommentForm" => $discussionCommentForm)) ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>  
</div>
<?php include_partial('discussion_comment/js') ?>