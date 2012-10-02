<form id="discussion-topic-reply-form-<?php echo $discussionTopicMessageId ?>" action="<?php echo url_for('@discussion_topic_reply_new') ?>" method="post">
    <?php $form->setDefault("discussion_topic_message_id", $discussionTopicMessageId) ?>    
    <?php echo $form->renderHiddenFields(true) ?>
    <a class="image" href="/backend.php/profile">
        <?php include_partial('personal_info/photo', array('user' => $sf_user->getGuardUser(), "dimension" => 36)) ?>
    </a>
    <div class="value">
        <div class="input">
            <?php echo $form["reply"] ?>
        </div> 
        <div class="discussion_topic_actions">
            <input messageid="<?php echo $discussionTopicMessageId ?>" class="button hide submit-discussion-topic-reply" type="button" value="Reply" />
        </div>
    </div>
</form>
<script type='text/javascript'>
    //<![CDATA[
    $(document).ready(function(){
        //        $('textarea').elastic();
        //        $('textarea').trigger('update');
    });
    //]]>
</script>
