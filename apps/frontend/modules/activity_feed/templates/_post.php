<?php use_helper('I18N', 'Date') ?>
<?php $discussionPost = Doctrine_Core::getTable('DiscussionPost')->find($activityFeed->getItemId()) ?>
<?php if ($discussionPost): ?>
<?php $discussionCommentForm = new DiscussionCommentForm() ?>
<?php $discussionCommentForm->setDefault("discussion_post_id", $discussionPost->getId()) ?>  
  <div class="thread discussion-group-post snapshot" id="discussion-group-post-<?php echo $discussionPost->getId() ?>">
    <?php include_partial('personal_info/photo', array('profile' => $discussionPost->getProfile(), "dimension" => 36)) ?>
    <div class="body" id="message-<?php echo $discussionPost->getId() ?>">
      <?php echo $discussionPost->getMessage() ?>          
      <div class="user-meta">By <?php echo link_to($discussionPost->getProfile(), 'profile_show', $discussionPost->getProfile()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($discussionPost->getCreatedAt()) ?></span></div>
    </div>
    <div class="comments">
      <div class="statistics">
        <span class="stats-item comment-count">
          <span class="list-count" id="comment-count-<?php echo $discussionPost->getId() ?>"><?php echo $discussionPost->getComments()->count() ?></span> <span class="comment-toggler" postid="<?php echo $discussionPost->getId() ?>">Show comment(s)</span>
        </span>
      </div>
      <div class="discussion-comment-holder-<?php echo $discussionPost->getId() ?>">
        <div id="discussion-comments-<?php echo $discussionPost->getId() ?>" class="hide">
          <?php include_partial("discussion_comment/list", array("discussionComments" => $discussionPost->getComments())) ?>            
        </div>
        <div id="discussion-comment-form-holder-<?php echo $discussionPost->getId() ?>" class="comment comment-details">
          <?php include_partial("discussion_comment/form", array("form" => $discussionCommentForm, "discussionPostId" => $discussionPost->getId())) ?>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>