<?php use_helper('I18N', 'Date') ?>

<?php $showProfileMenu = ($sf_user->getMyAttribute('discussion_module_id', DiscussionTable::MODULE_DISCUSSION) == DiscussionTable::MODULE_PROFILE) ?>

<?php slot('nav_vertical') ?>
<?php if ($showProfileMenu): ?>
    <?php include_partial('common/nav_vertical_tertiary', array("item_level_1" => "profile", "item_level_2" => "my_profile", "current_route" => "discussion", "include_bottom_block" => false, "bottom_block" => "profile/correspondents")) ?>
<?php else: ?>
    <?php if ($course): ?>
        <?php include_partial('common/nav_vertical_secondary', array("item_level_1" => "dashboard_course", "item_level_2" => "course_home", "Course Home", "current_route" => "course_discussion")) ?>
    <?php else: ?>
        <?php include_partial('common/nav_vertical_secondary', array("item_level_1" => "dashboard_discussion", "item_level_2" => "discussion_home", "Discussion Home", "current_route" => "discussion_show")) ?>
    <?php endif; ?>
<?php endif; ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php if ($showProfileMenu): ?>
    <?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Profile" => "profile", "My Discussions" => "discussion", "Discussion ~ " . myToolkit::shortenString($discussion_topic->getDiscussion()->getName(), 30) => "discussion/" . $discussion_topic->getDiscussionId(), "Topic ~ " . myToolkit::shortenString($discussion_topic->getSubject(), 30) => "discussion_topic/" . $discussion_topic->getId()))) ?>
<?php else: ?>
    <?php if ($course): ?>
        <?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Dashboard" => "dashboard", "My Courses" => "my_courses", "Course ~ " . $course->getCode() => "course/" . $course->getId(), "Discussions" => "course_discussion", "Discussion ~ " . myToolkit::shortenString($discussion_topic->getDiscussion()->getName(), 30) => "discussion/" . $discussion_topic->getDiscussion()->getId(), "Topic ~ " . myToolkit::shortenString($discussion_topic->getSubject(), 30) => "discussion_topic/" . $discussion_topic->getId()))) ?>
    <?php else: ?>
        <?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Dashboard" => "dashboard", "My Discussions" => "discussion", "Discussion ~ " . myToolkit::shortenString($discussion_topic->getDiscussion()->getName(), 30) => "discussion/" . $discussion_topic->getDiscussionId(), "Topic ~ " . myToolkit::shortenString($discussion_topic->getSubject(), 30) => "discussion_topic/" . $discussion_topic->getId()))) ?>
    <?php endif; ?>
<?php endif; ?>
<?php end_slot() ?>

<?php include_partial('discussion_topic/flashes') ?>
<?php if ($showProfileMenu): ?>
    <div class="content-block" id="profile-info">
        <?php include_component("profile", "info") ?>
    </div>
<?php endif; ?>
<div class="sf_admin_heading">
    <h3><?php echo __('Discussion Topic ~ %%name%%', array('%%name%%' => $discussion_topic->getSubject()), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">
    <div id="sf_admin_content">
        <?php include_partial('discussion_topic/topic', array('discussion_topic' => $discussion_topic, "helper" => $helper)) ?>
        <ul class="sf_admin_actions" style="clear:both">
            <li class="sf_admin_action_list_discussion">
                <input class="button" type="button" value="&lt; My Discussion" onclick="document.location.href='/backend.php/discussion/<?php echo $discussion_topic->getDiscussionId() ?>';return false">                            
            </li>
            <li class="sf_admin_action_manage_member">
                <input type="button" class="button" onclick="document.location.href='/backend.php/discussion_member';" value="Manage Participants" />
            </li>
        </ul>
        <div class="sf_admin_show">
            <h2><span id="replies-count"><?php echo $discussion_topic->getNbReplies() ?></span> replies  of <span id="messages-count"><?php echo $discussion_topic->getNbMessages() ?></span> message(s)</h2>
            <div id="discussion_topic_message_form_container"></div>
            <div id="discussion-topic-replies">
                <?php foreach ($discussion_topic->retrieveMessages() as $discussionTopicMessage): ?>
                    <?php include_partial('discussion_topic_message/message', array('discussionTopicMessage' => $discussionTopicMessage, "form" => $replyForm)) ?>
                <?php endforeach; ?>
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
