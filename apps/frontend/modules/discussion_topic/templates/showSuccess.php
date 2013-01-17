<?php use_helper('I18N', 'Date') ?>
<?php if ($course->getId()): ?>
    <?php include_component('common', 'secureMenu', $helper->courseLinks($discussionTopic)) ?>
    <?php include_component('common', 'secureMenu', $helper->discussionLinks($discussionTopic)) ?>
<?php else: ?>
<?php endif; ?>
<?php if ($course->getId()): ?>
    <?php include_partial('common/breadcrumbs', $helper->courseBreadcrumbs($discussionTopic)) ?>
    <?php include_partial('common/breadcrumbs', $helper->discussionBreadcrumbs($discussionTopic)) ?>
<?php else: ?>
<?php endif; ?>
<div id="discussion-notice" class="notice">&nbsp;</div>
<div class="sf_admin_heading">
    <h3><?php echo __('Topic ~ %%name%%', array('%%name%%' => $discussionTopic->getSubject()), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">
    <div id="sf_admin_content">
        <div class="content-block">
            <div id="discussion-topic">
                <div class="snapshot">
                    <?php include_partial('personal_info/photo', array('profile' => $discussionTopic->getProfile(), "dimension" => 36)) ?>
                    <div class="body">
                        <?php echo $discussionTopic->getMessage() ?>
                    </div>
                    <div class="statistics">
                        <span class="list-count"><?php echo $discussionTopic->getPosts()->count() ?></span> posts 
                        <span class="list-count"><?php echo $discussionTopic->getCommentCount() ?></span> comments
                        <span class="list-count"><?php echo $discussionTopic->getViewCount() ?></span> views
                        <span class="list-count"><?php echo $discussionTopic->getDiscussion()->getPeers()->count() ?></span> peers
                    </div>
                </div>
            </div>
            <?php include_partial('common/actions', array('actions' => $helper->showContentActions($discussionTopic))) ?>
        </div>
        <div class="content-block">
            <div id="discussion_post_form_container">
                <div id="sf_admin_form_container">
                    <?php include_partial('discussion_post/form', array('discussion_post' => new DiscussionPost(), 'form' => $discussionPostForm)) ?>
                </div>
            </div>
            <div id="discussion-comments">
                <?php foreach ($discussionTopic->getPosts() as $discussionPost): ?>
                    <?php include_partial('discussion_post/post', array('discussionPost' => $discussionPost, "discussionCommentForm" => $discussionCommentForm, "discussionPostForm" => new DiscussionPostForm($discussionPost), "helper" => new discussion_topicGeneratorHelper())) ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
    $(document).ready(function(){
        $('.message-edit textarea').redactor();

        $("a.reply").click(function(){
            $(".discussion_comment").hide();
            $("#discussion_topic_" + $(this).attr("id")).show();
            return false;
        });

        $(".discussion_topic .edit").click(function(){
            openPopup($(this).attr("href"),"600px","600px","Edit Discussion Topic");
            return false;
        });

        $("#invite_follower ").click(function(){
            openPopup($(this).attr("href"),'556px','556px','+ Invite Discussion Peers');
            return false;
        });

        // submit discussion topic comments
        $('.submit-discussion-comment').click(function(){
            $this = $(this);
            var messageId = $this.attr('messageid');

            if ($this.val() != "Commenting..." && $('#discussion-comment-form-' + messageId + ' textarea').val() != "") {
                $this.val("Commenting...");
                $('#discussion-comment-form-' + messageId).ajaxSubmit(function(data){
                    if (data != 'failure') {
                        $.get('/discussion_comment/' + data,{},function(replyData){
                            $('#discussion-comments-' + messageId).append(replyData);
                        },'html');

                        // increment the replies count
                        var postCommentCount = $('#comment-count-' + messageId).html();
                        var topicCommentCount = $('#comment-count').html();
                        postCommentCount = parseInt(postCommentCount) + 1;
                        topicCommentCount = parseInt(topicCommentCount) + 1;

                        $('#comment-count-' + messageId).html(postCommentCount);
                        $('#comment-count').html(topicCommentCount);

                        $('#discussion-comment-form-holder-' + messageId).load('/discussion_comment/new');
                    }
                });
                return false;
            }
        });

        $(".peer-actions .invite").click(function(){
            var ProfileId = $(this).attr("ProfileId");
            $.get('/discussion/peer/accept/' + ProfileId,{},function(response){
                $("#discussion-notice").html(response);
                $(".notice").hide();
                $("#discussion-notice").show();
                setTimeout(function(){
                    $(".notice").hide();
                },3000);
                $("#suggested-followers").load("/discussion/peer/suggested");
            },'html');
        });

        $(".message").hover(function(){
            if (!$(this).hasClass("editing")) {
                $(this).children(".inline-content-actions").show();
            }
        },
        function(){
            $(this).children(".inline-content-actions").hide();
        });

        $(".message .button-edit").click(function(){
            $("#message-" + $(this).attr("id")).addClass("editing");
            $("#message-" + $(this).attr("id") + " .view-mode").hide();
            $("#message-" + $(this).attr("id") + " .edit-mode").show();
            return false;
        });

        $('.update').click(function(){
            var messageId = $(this).attr("id");
            var message = $("#discussion_post_form_" + messageId + " textarea").val();
            if ($.trim(message) == "") {
                alert("Please enter your discussion post!");
                return;
            }

            if ($(this).val() != "Loading...") {
                $(this).val("Loading...");
                $("#discussion_post_form_" + messageId).ajaxSubmit(function(data){
                    if (data == "success") {
                        $("#message-" + messageId).html(message);
                    }
                    else{
                        alert("Oops! Your post couldn't be edited at this time.");
                    }
                });
                $("#message-" + messageId).removeClass("editing");
                $(this).val("Update");
            }
        });
    });
</script>
