<?php echo $form->setDefault("discussion_post_id", $discussionPostId) ?>
<form id="discussion-comment-form-<?php echo $discussionPostId ?>" action="<?php echo url_for('@discussion_comment') ?>" method="post">
    <?php echo $form->renderHiddenFields(true) ?>
    <?php include_partial('tpPersonalInfo/photo', array('profile' => $sf_user->getProfile(), "dimension" => 36)) ?>
    <div class="value">
        <div class="input hide" id="redactor_comment_holder_<?php echo $discussionPostId ?>">
            <?php echo $form["reply"] ?>
        </div>
        <input type="text" class="discussion_comment_placeholder" value="You could leave a comment ..." name="discussion_comment_placeholder" id="discussion_comment_placeholder" postid="<?php echo $discussionPostId ?>"> 
        <div class="discussion_topic_actions">
            <input postid="<?php echo $discussionPostId ?>" class="button submit-discussion-comment" type="button" value="Comment" />
        </div>
    </div>
</form>
<script type='text/javascript'>
    //<![CDATA[
    $(document).ready(function(){
        $('#discussion-comment-form-<?php echo $discussionPostId ?> textarea').redactor({ toolbar: false });
    });
    //]]>
</script>