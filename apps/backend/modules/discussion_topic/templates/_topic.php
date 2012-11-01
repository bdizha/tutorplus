<?php use_helper('I18N', 'Date') ?>
<div class="even-row discussion_topic">
    <?php include_partial('personal_info/photo', array('user' => $discussion_topic->getUser(), "dimension" => 36)) ?>
    <a href="/backend.php/discussion_topic/<?php echo $discussion_topic->getSlug() ?>"><?php echo $discussion_topic->getSubject() ?></a>
    <div class="value"><?php echo $discussion_topic->getHtmlizedMessage() ?></div>
    <div class="user_meta">By <?php echo link_to($discussion_topic->getUser(), 'profile_show', $discussion_topic->getUser()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($discussion_topic->getUpdatedAt()) ?></span> - <a href="/backend.php/discussion_topic/<?php echo $discussion_topic->getId() ?>"><?php echo $discussion_topic->getNbReplies($sf_user->getId()) ?> new replies of <?php echo $discussion_topic->getNbMessages() ?> messages</a></div>
    <?php if ($discussion_topic->getUserId() == $sf_user->getId() && !isset($showActions)): ?>
        <div class="item-actions">
            <?php echo $helper->linkToEdit($discussion_topic, array('params' => array(), 'class_suffix' => 'edit', 'label' => 'Edit',)) ?>
            <?php echo $helper->linkToDelete($discussion_topic, array('params' => array(), 'confirm' => 'Are you sure?', 'class_suffix' => 'delete', 'label' => 'Delete',)) ?>
        </div>
    <?php endif; ?>
</div>