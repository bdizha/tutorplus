<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_secondary', array("item_level_1" => "dashboard_course", "item_level_2" => "course_home", "Course Home", "current_route" => "course_discussion")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Dashboard" => "dashboard", "My Courses" => "my_courses", "Course ~ " . $course->getCode() => "course/" . $course->getId(), "Discussions" => "course_discussion"))) ?>
<?php end_slot() ?>

<?php include_partial('course_discussion/flashes') ?>
<div class="sf_admin_heading">
    <h3><?php echo __('Discussions', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_content">
    <div class="content-block">
        <?php include_partial('course_discussion/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
        <ul class="sf_admin_actions">
            <?php include_partial('course_discussion/list_batch_actions', array('helper' => $helper)) ?>
            <?php include_partial('course_discussion/list_actions', array('helper' => $helper)) ?>
            <?php include_partial('course_discussion/list_footer', array('helper' => $helper)) ?>
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
                <?php else: ?>
                    <div class="section_description">
                        Currently there're no discussion topics.                    
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>