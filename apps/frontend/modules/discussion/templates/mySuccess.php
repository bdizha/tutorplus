<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->myLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->myBreadcrumbs()) ?>
<?php end_slot() ?>

<?php include_partial('discussion/flashes') ?>
<div class="sf_admin_heading">
    <h3><?php echo __('My Discussions', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_content">
    <div class="content-block">
        <div id="discussion_container">
            <ul class="top-actions">
                <?php include_partial('discussion/list_actions', array('helper' => $helper)) ?>
            </ul>
            <div class="discussion-left-block">
                <?php include_partial('discussion/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
                <ul class="sf_admin_actions">
                    <?php include_partial('discussion/list_batch_actions', array('helper' => $helper)) ?>
                    <?php include_partial('discussion/list_actions', array('helper' => $helper)) ?>
                    <?php include_partial('discussion/list_footer', array('helper' => $helper)) ?>
                </ul>
            </div>
            <div class="discussion-right-block">
<!--                <h3>Discussions Statistics</h3>
                <div id="discussion_stats">
                    <div class="discussion-row">
                        <span class="list-count"><?php echo $discussionActivity["new_topics"] ?></span> topic(s)
                    </div>
                    <div class="discussion-row">
                        <span class="list-count"><?php echo $discussionActivity["new_messages"] ?></span> post(s)
                    </div>
                    <div class="discussion-row">
                        <span class="list-count"><?php echo $discussionActivity["new_replies"] ?></span> comment(s)
                    </div>
                    <div class="discussion-row">
                        <span class="list-count"><?php echo $discussionActivity["new_members"] ?></span> follower(s)
                    </div>
                </div>-->
                <h3>Recent topics</h3>
                <div id="recent-topics">
                    <?php if ($discussionTopics): ?>
                        <?php foreach ($discussionTopics as $discussionTopic): ?>
                            <div class="snapshot">
                                <?php include_partial('personal_info/photo', array('profile' => $discussionTopic->getProfile(), "dimension" => 36)) ?>
                                <?php echo link_to($discussionTopic->getSubject(), 'discussion_topic_show', $discussionTopic) ?>
                            </div>                    
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="discussion-row">There's no topics started yet.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
    $(document).ready(function(){    
        $(".discussion").hover(function(){
            $(this).children(".inline-content-actions").show();
        },
        function(){
            $(this).children(".inline-content-actions").hide();
        });
    });
</script>