<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->indexLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs()) ?>
<div class="sf_admin_heading">
    <h3>Activity Feeds ~ <?php echo date("M, j Y", strtotime($sf_user->getProfile()->getCreatedAt())) ?> to this day</h3>
</div>
<div id="sf_admin_content">
    <div class="content-block" id="timeline">
        <div id="discussion_post_form_container">
            <?php include_partial('discussion_post/form', array('discussion_post' => new DiscussionPost(), 'form' => $discussionPostForm)) ?>
        </div>
        <div id="discussion-comments">
            <?php foreach ($activityFeeds as $key => $activityFeed): ?>
                <?php include_partial('activity_feed/snapshot', array('activityFeed' => $activityFeed)) ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php include_partial('discussion_comment/js') ?>