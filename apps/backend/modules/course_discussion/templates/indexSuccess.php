<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->indexLinks($course)) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs($course)) ?>
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
            <h2>Weekly course discussions activity overview</h2>
            <div id="discussion_stats" class="section_description">
                <div class="even-row"><?php echo $discussionActivity["new_topics"] ?> discussion topic(s) started</div>
                <div class="even-row"><?php echo $discussionActivity["new_messages"] ?> discussion message(s)</div>
                <div class="even-row"><?php echo $discussionActivity["new_replies"] ?> discussion replies</div>
                <div class="even-row"><?php echo $discussionActivity["new_members"] ?> new member(s) have joined discussion group(s)</div>
            </div>
        </div>
        <div class="right-block">
            <h2>The most recent topic with fresh and interesting activities</h2>
            <?php if ($discussionTopic): ?>
                <?php include_partial('discussion_topic/topic', array('discussion_topic' => $discussionTopic, "showActions" => false)) ?>
            <?php else: ?>
                <div class="even-row">
                    Currently there're no discussion topics started.                    
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>