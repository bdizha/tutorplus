<div class="peer" id="discussion-group-peer-<?php echo $member->getId() ?>">
    <?php include_partial('personal_info/photo', array('profile' => $member->getProfile(), "dimension" => 48)) ?>
    <div class="name"><?php echo link_to($member->getNickname(), 'profile_show', $member->getProfile()) ?></div>
    <div class="type"><?php echo $member->getStatusDisplay() ?></h4>
    </div>
</div>