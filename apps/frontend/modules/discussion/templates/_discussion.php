<?php use_helper('I18N', 'Date') ?>
<div class="discussion">
    <div class="discussion-view">
        <?php echo $helper->linkToDiscussionView($discussion, array()) ?>
    </div>
    <?php include_partial('personal_info/photo', array('user' => $discussion->getUser(), "dimension" => 36)) ?>
    <div class="name"><?php echo link_to($discussion->getName(), 'discussion_show', $discussion) ?></div>
    <div class="value"><?php echo $discussion->getHtmlizedDescription() ?></div>
    <div class="user_meta">By <?php echo link_to($discussion->getUser(), 'profile_show', $discussion->getUser()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($discussion->getUpdatedAt()) ?></span> - <a href="/discussion/<?php echo $discussion->getSlug() ?>"><?php echo $discussion->getNbTopics() ?> topics of <?php echo $discussion->getNbTopics() ?> followers</a></div>
    <?php if ($discussion->getUserId() == $sf_user->getId() && !isset($showActions)): ?>
        <div class="discussion-actions">
            <?php echo $helper->linkToDiscussionEdit($discussion, array()) ?>
            <?php echo $helper->linkToDiscussionDelete($discussion, array("confirm" => "Are you sure?")) ?>
        </div>
    <?php endif; ?>
</div>