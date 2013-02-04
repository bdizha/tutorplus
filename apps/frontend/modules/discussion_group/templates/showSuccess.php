<?php use_helper('I18N', 'Date') ?>
<?php if (is_object($course) && $course->getId()): ?>
    <?php include_component('common', 'secureMenu', $helper->getCourseLinks()) ?>
    <?php include_partial('common/breadcrumbs', $helper->getCourseBreadcrumbs($discussionGroup)) ?>
<?php else: ?>
    <?php include_component('common', 'secureMenu', $helper->getShowLinks()) ?>
    <?php include_partial('common/breadcrumbs', $helper->getShowBreadcrumbs($discussionGroup)) ?>
<?php endif; ?>
<div class="sf_admin_heading">
    <?php if (is_object($course) && $course->getId()): ?>
        <h3><?php echo __('%%code%% ~ %%name%%', array('%%code%%' => $course->getCode(), '%%name%%' => $course->getName()), 'messages') ?></h3>
    <?php else: ?>
        <h3>Group ~ <?php echo $discussionGroup->getName() ?></h3>
    <?php endif; ?>
</div>
<div id="sf_admin_content">
    <?php include_partial('common/flashes_normal') ?>
    <div class="content-block">
        <?php include_partial('common/tabs', array('tabs' => $helper->getShowTabs($discussionGroup, $course))) ?>
        <div class="tab-block" id="my_peers">            
            <div id="discussion_group">
                <div class="snapshot">
                    <?php include_partial('personal_info/photo', array('profile' => $discussionGroup->getProfile(), "dimension" => 36)) ?>
                    <div class="name">
                        <?php echo link_to($discussionGroup->getName(), 'discussion_group_show', $discussionGroup) ?>
                    </div>
                    <div class="body">
                        <?php echo $discussionGroup->getDescription() ?>
                        <div class="user-meta">Started by <?php echo link_to($discussionGroup->getProfile(), 'profile_show', $discussionGroup->getProfile()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($discussionGroup->getCreatedAt()) ?></span></div>
                    </div>
                    <div class="statistics">
                        <span class="list-count"><?php echo $discussionGroup->getTopics()->count() ?></span> topics 
                        <span class="list-count"><?php echo $discussionGroup->getPostCount() ?></span> posts 
                        <span class="list-count"><?php echo $discussionGroup->getCommentCount() ?></span> comments
                        <span class="list-count"><?php echo $discussionGroup->getViewCount() ?></span> views
                        <span class="list-count"><?php echo $discussionGroup->getPeers()->count() ?></span> peers
                    </div>
                </div>
            </div>
            <?php include_partial('common/actions', array('actions' => $helper->getShowActions($discussionGroup, $discussionPeer, $discussionGroup->hasProfile($sf_user->getId())))) ?>
            <div id="discussion_topics">
                <?php include_partial('discussion_topic/list', array('discussionTopics' => $discussionGroup->getTopics(), 'helper' => $helper)) ?>
            </div>
        </div>
    </div>
</div>
<?php include_partial('discussion_group/js', array("helper" => $helper)) ?>