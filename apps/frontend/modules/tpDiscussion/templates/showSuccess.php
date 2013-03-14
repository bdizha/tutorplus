<?php use_helper('I18N', 'Date') ?>    
<?php include_component('common', 'secureMenu', $helper->getLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->getBreadcrumbs("discussion_info", $discussion->getName(), "/discussion/" . $discussion->getSlug(), $discussion)) ?>
<div id="sf_admin_content">
    <?php include_partial('common/flashes_normal') ?>
    <div class="content-block">
        <?php include_partial('common/tabs', array('tabs' => $helper->getShowTabs($discussion, "show"))) ?>
        <div class="tab-block">
            <?php include_partial('common/actions', array('actions' => $helper->getActions($discussion, $discussionPeer, $discussion->hasProfile($sf_user->getId())))) ?>
            <div class="snapshot">
                <?php include_partial('personal_info/photo', array('profile' => $discussion->getProfile(), "dimension" => 36)) ?>
                <div class="name">
                    <?php echo $discussion->getName() ?>
                </div>
                <div class="body">
                    <?php echo $discussion->getDescription() ?>
                    <div class="user-meta">
                        Started by
                        <?php echo link_to($discussion->getProfile(), 'profile_show', $discussion->getProfile()) ?>
                        - <span class="datetime"><?php echo myToolkit::dateInWords($discussion->getCreatedAt()) ?>
                        </span>
                    </div>
                </div>
                <div class="statistics">
                    <span class="list-count"><?php echo $discussion->getTopics()->count() ?></span> topics
                    <span class="list-count"><?php echo $discussion->getPostCount() ?></span> posts
                    <span class="list-count"><?php echo $discussion->getCommentCount() ?></span> comments
                    <span class="list-count"><?php echo $discussion->getViewCount() ?></span> views
                    <span class="list-count"><?php echo $discussion->getPeers()->count() ?></span> peers
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_partial('discussion/js', array("helper" => $helper)) ?>