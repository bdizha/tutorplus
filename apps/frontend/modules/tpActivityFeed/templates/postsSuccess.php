<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getLinks()) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->getBreadcrumbs("Posts", "timeline/posts")) ?>
<div id="sf_admin_content">
    <?php include_partial('tpCommon/flashes_normal') ?>
    <div class="content-block">
        <?php include_partial('tpCommon/tabs', $helper->getTabs("posts", $indexActivityFeeds, $discussionActivityFeeds, $topicActivityFeeds, $postActivityFeeds)) ?>
        <div class="tab-block">
            <div id="discussion_post_form_container">
                <?php include_partial('tpDiscussionPost/form', array('discussion_post' => new DiscussionPost(), 'form' => $discussionPostForm)) ?>
            </div>
            <div id="discussion-posts">
                <?php foreach ($postActivityFeeds as $key => $activityFeed): ?>
                    <?php include_partial('tpActivityFeed/post', array('activityFeed' => $activityFeed, "discussionCommentForm" => $discussionCommentForm)) ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>  
</div>
<?php include_partial('tpDiscussionComment/js') ?>