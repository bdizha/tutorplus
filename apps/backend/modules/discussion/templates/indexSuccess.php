<?php use_helper('I18N', 'Date') ?>

<?php $showProfileMenu = ($sf_user->getMyAttribute('discussion_module_id', DiscussionTable::MODULE_DISCUSSION) == DiscussionTable::MODULE_PROFILE) ?>

<?php slot('nav_vertical') ?>
<?php if ($showProfileMenu): ?>
    <?php if ($sf_user->getId() == $sf_user->getMyAttribute('peer_show_id', $sf_user->getId())): ?>
        <?php include_partial('common/nav_vertical_tertiary', array("item_level_1" => "profile", "item_level_2" => "my_profile", "current_route" => "discussion")) ?>
    <?php else: ?>
        <?php include_partial('common/nav_vertical_secondary', array("item_level_1" => "peer_peers", "item_level_2" => "peer_home", "current_route" => "discussion")) ?>
    <?php endif; ?>
<?php else: ?>
    <?php if (isset($course) && !$course->isNew()): ?>
        <?php include_partial('common/nav_vertical_secondary', array("item_level_1" => "dashboard_course", "item_level_2" => "course_home", "Course Home", "current_route" => "discussion_show")) ?>
    <?php else: ?>
        <?php include_component('common', 'menu', array("current_parent" => "discussions", "current_child" => "discussions", "current_link" => "discussion_explorer")) ?>
    <?php endif; ?>
<?php endif; ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php if ($showProfileMenu): ?>
    <?php if ($sf_user->getId() == $sf_user->getMyAttribute('peer_show_id', $sf_user->getId())): ?>
        <?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Profile" => "profile", "My Discussions" => "discussion"))) ?>
    <?php else: ?>
        <?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Peers" => "peer", "Peer ~ " . $sf_user->getName() => "peer_home", "Discussions" => "discussion"))) ?>
    <?php endif; ?>
<?php else: ?>
    <?php if (isset($course) && !$course->isNew()): ?>
        <?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Dashboard" => "dashboard", "My Courses" => "my_courses", "Course ~ " . $course->getCode() => "course/" . $course->getId(), "Discussions" => "course_discussion", "Discussion ~ " . myToolkit::shortenString($discussion->getName(), 30) => "discussion/" . $discussion->getId()))) ?>
    <?php else: ?>
        <?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Discussion Explorer" => "discussion"))) ?>
    <?php endif; ?>
<?php endif; ?>
<?php end_slot() ?>

<?php include_partial('discussion/flashes') ?>
<?php if ($showProfileMenu): ?>
    <div class="content-block" id="profile-info">
        <?php include_component("profile", "info") ?>
    </div>
<?php endif; ?>
<div class="sf_admin_heading">
    <h3><?php echo __($showProfileMenu ? 'My Discussions' : 'Discussion Explorer', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_content">
    <div class="content-block">
        <?php include_partial('discussion/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
        <ul class="sf_admin_actions">
            <?php include_partial('discussion/list_batch_actions', array('helper' => $helper)) ?>
            <?php include_partial('discussion/list_actions', array('helper' => $helper)) ?>
            <?php include_partial('discussion/list_footer', array('helper' => $helper)) ?>
        </ul>        
    </div>
    <div class="content-block">
        <div class="left-block">
            <div class="content-block">
                <h2>Weekly course discussions activity overview</h2>
                <div id="discussion_stats" class="section_description">
                    <ul>
                        <li><?php echo $discussionActivity["new_topics"] ?> discussion topic(s) started</li>
                        <li><?php echo $discussionActivity["new_messages"] ?> discussion message(s)</li>
                        <li><?php echo $discussionActivity["new_replies"] ?> discussion replies</li>
                        <li><?php echo $discussionActivity["new_members"] ?> new member(s) have joined discussion group(s)</li>
                    </ul>
                </div>
            </div>       
        </div>
        <div class="right-block">
            <div class="content-block">
                <h2>The most recent topic with fresh and interesting activities</h2>
                <?php if ($discussionTopic): ?>
                    <?php include_partial('discussion_topic/topic', array('discussion_topic' => $discussionTopic, "showActions" => false)) ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>