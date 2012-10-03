<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->timelineLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->timelineBreadcrumbs()) ?>
<?php end_slot() ?>

<?php include_partial('discussion_topic/flashes') ?>

<div id="sf_admin_form_container">
    <div id="sf_admin_content">
        <div class="content-block" id="profile_discussion">
            <div class="left-block">        
                <h2>The Most Recent Posting</h2>
                <?php if ($recentDiscussionTopic): ?>
                    <?php include_partial('discussion_topic/topic', array('discussion_topic' => $recentDiscussionTopic, "showActions" => false)) ?>
                <?php else: ?>
                    <div class="even-row">There're no discussion topics started currently.</div>
                <?php endif; ?>
            </div>    
            <div class="right-block">        
                <h2>The Most Engaging Posting</h2>
                <?php if ($favouredDiscussionTopic): ?>
                    <?php include_partial('discussion_topic/topic', array('discussion_topic' => $favouredDiscussionTopic, "showActions" => false)) ?>
                <?php else: ?>
                    <div class="even-row">There're no discussion topics started currently.</div>
                <?php endif; ?>
            </div>
            <br style="clear:both"/>
        </div>
        <div class="content-block">
            <h2>Batanayi Matuku's Discussion Wall</h2>
            <div id="discussion_topic_message_form_container"></div>
            <div class="full-block plain-row">
                <div id="discussion-topic-replies">
                    <?php foreach ($discussionTopic->retrieveMessages() as $discussionTopicMessage): ?>
                        <?php include_partial('discussion_topic_message/message', array('discussionTopicMessage' => $discussionTopicMessage, "form" => $replyForm)) ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
    $(document).ready(function(){
        $("#discussion_topic_message_form_container").append(loadingHtml);		
        $("#discussion_topic_message_form_container").load('<?php echo url_for('@discussion_topic_message_new') ?>');
        
        $("a.reply").click(function(){
            $(".discussion_topic_reply").hide();            
            $("#discussion_topic_" + $(this).attr("id")).show();
            return false;
        });
        
        $(".discussion_topic .edit").click(function(){            
            openPopup($(this).attr("href"), "600px", "600px", "Edit Discussion Topic");
            return false;
        });    
    });    
</script>
