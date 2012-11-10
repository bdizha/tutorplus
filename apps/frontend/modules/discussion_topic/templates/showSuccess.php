<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php if ($course->getId()): ?>
    <?php include_component('common', 'menu', $helper->courseLinks($discussionTopic)) ?>
<?php else: ?>
    <?php include_component('common', 'menu', $helper->discussionLinks($discussionTopic)) ?>
<?php endif; ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php if ($course->getId()): ?>
    <?php include_partial('common/breadcrumbs', $helper->courseBreadcrumbs($discussionTopic)) ?>
<?php else: ?>
    <?php include_partial('common/breadcrumbs', $helper->discussionBreadcrumbs($discussionTopic)) ?>
<?php endif; ?>
<?php end_slot() ?>

<?php include_partial('discussion_topic/flashes') ?>

<div class="sf_admin_heading">
    <h3><?php echo __('Discussion Topic ~ %%name%%', array('%%name%%' => $discussionTopic->getSubject()), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">
    <div id="sf_admin_content">
        <div class="content-block">
            <h2><?php echo $discussionTopic->getSubject() ?></h2>
            <?php include_partial('discussion_topic/topic', array('discussion_topic' => $discussionTopic, "helper" => $helper)) ?>
            <?php include_partial('common/content_actions', array('actions' => $helper->showContentActions($discussionTopic))) ?>
        </div>
        <div class="content-block">
            <h2><span id="replies-count"><?php echo $discussionTopic->getNbReplies() ?></span> replies  of <span id="messages-count"><?php echo $discussionTopic->getNbMessages() ?></span> message(s)</h2>
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
