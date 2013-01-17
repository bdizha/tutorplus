<?php echo $form->setDefault("discussion_post_id", $discussionPostId) ?>
<form id="discussion-comment-form-<?php echo $discussionPostId ?>" action="<?php echo url_for('@discussion_comment_new') ?>" method="post">
    <?php echo $form->renderHiddenFields(true) ?>
    <?php include_partial('personal_info/photo', array('profile' => $sf_user->getProfile(), "dimension" => 36)) ?>
    <div class="value">
        <div class="input"><?php echo $form["reply"] ?></div> 
        <div class="discussion_topic_actions">
            <input messageid="<?php echo $discussionPostId ?>" class="button submit-discussion-comment" type="button" value="Comment" />
        </div>
    </div>
</form>
<script type='text/javascript'>
    //<![CDATA[
    $(document).ready(function(){
        $('#discussion-comment-form-<?php echo $discussionPostId ?> textarea').redactor();
    });
    //]]>
</script>