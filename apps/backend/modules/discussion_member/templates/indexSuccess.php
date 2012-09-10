<?php use_helper('I18N', 'Date') ?>

<?php $showProfileMenu = ($sf_user->getMyAttribute('discussion_module_id', DiscussionTable::MODULE_DISCUSSION) == DiscussionTable::MODULE_PROFILE) ?>

<?php slot('nav_vertical') ?>
<?php if ($showProfileMenu): ?>
    <?php include_partial('common/nav_vertical_tertiary', array("item_level_1" => "profile", "item_level_2" => "my_profile", "current_route" => "discussion", "include_bottom_block" => false, "bottom_block" => "profile/correspondents")) ?>
<?php else: ?>
    <?php if ($course): ?>
        <?php include_partial('common/nav_vertical_secondary', array("item_level_1" => "dashboard_course", "item_level_2" => "course_home", "Course Home", "current_route" => "course_discussion")) ?>
    <?php else: ?>
        <?php include_partial('common/nav_vertical_secondary', array("item_level_1" => "dashboard_discussion", "item_level_2" => "discussion_home", "Discussion Home", "current_route" => "discussion_member")) ?>
    <?php endif; ?>
<?php endif; ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php if ($showProfileMenu): ?>
    <?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Profile" => "profile", "My Discussions" => "discussion", "Discussion ~ " . myToolkit::shortenString($discussion->getName(), 30) => "discussion/" . $discussion->getId(), "Discussion ~ Participants" => "discussion_member"))) ?>
<?php else: ?>
    <?php if ($course): ?>
        <?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Dashboard" => "dashboard", "My Courses" => "my_courses", "Course ~ " . $course->getCode() => "course/" . $course->getId(), "Discussions" => "course_discussion", "Discussion ~ " . myToolkit::shortenString($discussion->getName(), 30) => "discussion/" . $discussion->getId(), "Discussion ~ Participants" => "discussion_members"))) ?>
    <?php else: ?>
        <?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Dashboard" => "dashboard", "My Discussions" => "discussion", "Discussion ~ " . myToolkit::shortenString($discussion->getName(), 30) => "discussion/" . $discussion->getId(), "Discussion ~ Participants" => "discussion_member"))) ?>
    <?php endif; ?>
<?php endif; ?>
<?php end_slot() ?>

<?php include_partial('discussion_member/flashes') ?>
<div class="sf_admin_heading">
    <h3><?php echo __('Discussion ~ Participants', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_content">
    <?php include_partial('discussion_member/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
        <?php include_partial('discussion_member/list_batch_actions', array('helper' => $helper)) ?>
        <?php include_partial('discussion_member/list_actions', array('helper' => $helper)) ?>
    </ul>
</div>
<div id="sf_admin_footer">
    <?php include_partial('discussion_member/list_footer', array('pager' => $pager)) ?>
</div>
<script type='text/javascript'>
    $(document).ready(function(){        
        $(".sf_admin_list_td_user a").click(function(){
            $("#sf_admin_container").load($(this).attr("href"));
            return false;
        });
    });
</script>