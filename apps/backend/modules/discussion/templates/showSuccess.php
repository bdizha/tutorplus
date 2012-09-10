<?php use_helper('I18N', 'Date') ?>

<?php $showProfileMenu = ($sf_user->getMyAttribute('discussion_module_id', DiscussionTable::MODULE_DISCUSSION) == DiscussionTable::MODULE_PROFILE) ?>

<?php slot('nav_vertical') ?>
<?php if ($showProfileMenu): ?>
    <?php include_partial('common/nav_vertical_tertiary', array("item_level_1" => "profile", "item_level_2" => "my_profile", "current_route" => "discussion", "include_bottom_block" => false, "bottom_block" => "profile/correspondents")) ?>
<?php else: ?>
    <?php if ($course): ?>
        <?php include_partial('common/nav_vertical_secondary', array("item_level_1" => "dashboard_course", "item_level_2" => "course_home", "Course Home", "current_route" => "discussion_show")) ?>
    <?php else: ?>
        <?php include_component('common', 'menu', array("current_parent" => "discussions", "current_child" => "my_messages", "current_link" => "message_trash")) ?>
    <?php endif; ?>
<?php endif; ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php if ($showProfileMenu): ?>
    <?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Profile" => "profile", "My Discussions" => "discussion", "Discussion ~ " . myToolkit::shortenString($discussion->getName(), 30) => "discussion/" . $discussion->getId()))) ?>
<?php else: ?>
    <?php if ($course): ?>
        <?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Dashboard" => "dashboard", "My Courses" => "my_courses", "Course ~ " . $course->getCode() => "course/" . $course->getId(), "Discussions" => "course_discussion", "Discussion ~ " . myToolkit::shortenString($discussion->getName(), 30) => "discussion/" . $discussion->getId()))) ?>
    <?php else: ?>
        <?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Dashboard" => "dashboard", "My Discussions" => "discussion", "Discussion ~ " . myToolkit::shortenString($discussion->getName(), 30) => "discussion/" . $discussion->getId()))) ?>
    <?php endif; ?>
<?php endif; ?>
<?php end_slot() ?>
<script type="text/javascript">
    $(document).ready(function(){			
        fetchContent('/backend.php/discussion_topic');
    });
</script>