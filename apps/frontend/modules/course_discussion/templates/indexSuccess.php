<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->indexLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs()) ?>
<?php end_slot() ?>

<?php include_partial('course_discussion/flashes') ?>

<div class="sf_admin_heading">
    <h3><?php echo __('Course Discussions', array(), 'messages') ?></h3>
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
            <h2>Weekly Discussion Activities</h2>
            <div id="discussion_stats" class="plain-row">
                <div class="even-row"><span class="list-count"><?php echo $discussionActivity["new_topics"] ?></span> discussion topic(s) started</div>
                <div class="even-row"><span class="list-count"><?php echo $discussionActivity["new_messages"] ?></span> discussion message(s)</div>
                <div class="even-row"><span class="list-count"><?php echo $discussionActivity["new_replies"] ?></span> discussion replies</div>
                <div class="even-row"><span class="list-count"><?php echo $discussionActivity["new_members"] ?></span> new member(s) have joined discussion group(s)</div>
            </div>
        </div>
        <div class="right-block">
            <h2>Recent Posting</h2>
            <div class="plain-row" id="recent-posting">
                <?php if (!$discussionTopic): ?>
                <?php include_partial('discussion_topic/topic', array('discussion_topic' => $discussionTopic, "showActions" => false, "shortenString" => 120)) ?>
                <?php else: ?>
                <div class="even-row">There're currently no discussion topics started.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>