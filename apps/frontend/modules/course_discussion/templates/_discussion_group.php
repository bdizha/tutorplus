<?php use_helper('I18N', 'Date') ?>
<?php if ($courseDiscussionGroup): ?>
    <div class="heading">
        <?php include_partial('personal_info/photo', array('profile' => $courseDiscussionGroup->getProfile(), "dimension" => 36)) ?>
        <div class="name">
            <?php echo link_to($courseDiscussionGroup->getName(), 'discussion_group_show', $courseDiscussionGroup) ?>
        </div>
    </div>
    <div class="body">
        <?php echo $courseDiscussionGroup->getDescription() ?>
        <div class="user-meta">Started by <?php echo link_to($courseDiscussionGroup->getProfile(), 'profile_show', $courseDiscussionGroup->getProfile()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($courseDiscussionGroup->getCreatedAt()) ?></span></div>
    </div>
    <?php if ($courseDiscussionGroup->getProfileId() == $sf_user->getId() && !isset($getShowActions)): ?>
        <div class="inline-content-actions">
            <?php echo $helper->linkToDiscussionGroupView($courseDiscussionGroup, array()) ?>
            <?php echo $helper->linkToDiscussionGroupEdit($courseDiscussionGroup, array()) ?>
            <?php echo $helper->linkToDiscussionGroupDelete($courseDiscussionGroup, array("confirm" => "Are you sure?")) ?>
        </div>
    <?php endif; ?>
    <div class="statistics">
        <span class="list-count"><?php echo $courseDiscussionGroup->getTopics()->count() ?></span> topics 
        <span class="list-count"><?php echo $courseDiscussionGroup->getPostCount() ?></span> posts 
        <span class="list-count"><?php echo $courseDiscussionGroup->getCommentCount() ?></span> comments
        <span class="list-count"><?php echo $courseDiscussionGroup->getViewCount() ?></span> views
        <span class="list-count"><?php echo $courseDiscussionGroup->getPeers()->count() ?></span> peers
    </div>
<?php endif; ?>