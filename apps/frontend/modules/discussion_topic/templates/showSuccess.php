<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->getLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->getBreadcrumbs("discussion_topic_show", $discussionTopic)) ?>
<div id="sf_admin_content">
    <?php include_partial('common/flashes_normal') ?>
    <div class="content-block">
        <?php include_partial('common/tabs', array('tabs' => $helper->getShowTabs($discussionTopic, $myPeers))) ?>
        <div class="tab-block">
            <div class="snapshot<?php echo $discussionTopic->getProfileId() == $sf_user->getId() ? " current" : "" ?>">
                <?php include_partial('personal_info/photo', array('profile' => $discussionTopic->getProfile(), "dimension" => 36)) ?>
                <div class="name">
                    <?php echo$discussionTopic->getSubject() ?>
                </div>
                <div class="body">
                    <?php echo $discussionTopic->getMessage() ?>
                    <div class="user-meta">Started by <?php echo link_to($discussionTopic->getProfile(), 'profile_show', $discussionTopic->getProfile()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($discussionTopic->getCreatedAt()) ?></span></div>
                </div>
                <div class="statistics">
                    <span class="list-count"><?php echo $discussionTopic->getPosts()->count() ?></span> posts 
                    <span class="list-count"><?php echo $discussionTopic->getCommentCount() ?></span> comments
                    <span class="list-count"><?php echo $discussionTopic->getViewCount() ?></span> views
                    <span class="list-count"><?php echo $discussionTopic->getDiscussion()->getPeers()->count() ?></span> peers
                </div>
            </div>
            <?php include_partial('common/actions', array('actions' => $helper->getShowActions($discussion, $discussionPeer, $discussion->hasProfile($sf_user->getId())))) ?>
            <div id="discussion_post_form_container">
                <div id="sf_admin_form_container">
                    <?php include_partial('discussion_post/form', array('discussion_post' => new DiscussionPost(), 'form' => $discussionPostForm)) ?>
                </div>
            </div>
            <div id="discussion-posts">
                <?php foreach ($discussionTopic->getPosts() as $discussionPost): ?>
                    <?php include_partial('discussion_post/post', array('discussionPost' => $discussionPost, "discussionCommentForm" => $discussionCommentForm, "discussionPostForm" => new DiscussionPostForm($discussionPost), "helper" => new discussion_topicGeneratorHelper())) ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php include_partial('discussion_comment/js') ?>
<?php include_partial('discussion/js', array("helper" => $helper)) ?>