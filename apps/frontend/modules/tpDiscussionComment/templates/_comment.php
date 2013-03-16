<?php $user = $discussionComment->getProfile() ?>
<div class="comment">
    <?php include_partial('tpPersonalInfo/photo', array('profile' => $discussionComment->getProfile(), "dimension" => 36)) ?>
    <div class="body">
        <?php echo $discussionComment->getReply() ?>
        <div class="user-meta">By <?php echo link_to($discussionComment->getProfile(), 'profile_show', $discussionComment->getProfile()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($discussionComment->getCreatedAt()) ?></span></div>
    </div>
</div>