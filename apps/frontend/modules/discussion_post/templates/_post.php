<?php use_helper('I18N', 'Date') ?>
<div class="thread discussion-post snapshot" id="discussion-post-<?php echo $discussionPost->getId() ?>">
    <?php include_partial('personal_info/photo', array('profile' => $discussionPost->getProfile(), "dimension" => 36)) ?>
    <div class="body" id="message-<?php echo $discussionPost->getId() ?>">
        <div class="view-mode">
            <?php echo $discussionPost->getMessage() ?>            
        </div>
        <div class="edit-mode">
            <div class="message-edit" id="message-edit-<?php echo $discussionPost->getId() ?>">
                <?php include_partial('discussion_post/inline_form', array('discussionPost' => $discussionPost, 'form' => $discussionPostForm)) ?>
            </div>            
        </div>
        <div class="user-meta">By <?php echo link_to($discussionPost->getProfile(), 'profile_show', $discussionPost->getProfile()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($discussionPost->getUpdatedAt()) ?></span></div>
    </div>
    <div class="comments">
        <div class="statistics">
            <span class="stats-item comment-count">
                <span class="list-count" id="comment-count-<?php echo $discussionPost->getId() ?>"><?php echo $discussionPost->getComments()->count() ?></span> comment(s)
            </span>
        </div>
        <div id="discussion-comments-<?php echo $discussionPost->getId() ?>">
            <?php include_partial("discussion_comment/list", array("discussionComments" => $discussionPost->getComments())) ?>            
        </div>
        <div id="discussion-comment-form-holder-<?php echo $discussionPost->getId() ?>" class="comment reply-details">
            <?php include_partial("discussion_comment/form", array("form" => $discussionCommentForm, "discussionPostId" => $discussionPost->getId())) ?>
        </div>
    </div>
    <div class="inline-content-actions">
        <?php echo $helper->linkToDiscussionPostEdit($discussionPost, array()) ?>
    </div>
</div>