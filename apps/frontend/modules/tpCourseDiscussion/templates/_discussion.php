<?php use_helper('I18N', 'Date') ?>
<?php if ($courseDiscussion): ?>
    <div class="heading">
        <?php include_partial('tpPersonalInfo/photo', array('profile' => $courseDiscussion->getProfile(), "dimension" => 36)) ?>
        <div class="name">
            <?php echo link_to($courseDiscussion->getName(), 'discussion_show', $courseDiscussion) ?>
        </div>
    </div>
    <div class="body">
        <?php echo $courseDiscussion->getDescription() ?>
        <div class="user-meta">Started by <?php echo link_to($courseDiscussion->getProfile(), 'profile_show', $courseDiscussion->getProfile()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($courseDiscussion->getCreatedAt()) ?></span></div>
    </div>
    <?php if ($courseDiscussion->getProfileId() == $sf_user->getId() && !isset($showActions)): ?>
        <div class="inline-content-actions">
            <?php echo $helper->linkToDiscussionView($courseDiscussion, array()) ?>
            <?php echo $helper->linkToDiscussionEdit($courseDiscussion, array()) ?>
            <?php echo $helper->linkToDiscussionDelete($courseDiscussion, array("confirm" => "Are you sure?")) ?>
        </div>
    <?php endif; ?>
    <div class="statistics">
        <span class="list-count"><?php echo $courseDiscussion->getTopics()->count() ?></span> topics 
        <span class="list-count"><?php echo $courseDiscussion->getPostCount() ?></span> posts 
        <span class="list-count"><?php echo $courseDiscussion->getCommentCount() ?></span> comments
        <span class="list-count"><?php echo $courseDiscussion->getViewCount() ?></span> views
        <span class="list-count"><?php echo $courseDiscussion->getPeers()->count() ?></span> peers
    </div>
<?php endif; ?>