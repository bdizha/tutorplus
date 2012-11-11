<div class="peer" id="discussion-member-<?php echo $member->getId() ?>">
    <?php include_partial('personal_info/photo', array('user' => $member->getUser(), "dimension" => 48)) ?>
    <div class="name"><?php echo link_to($member->getNickname(), 'profile_show', $member->getUser()) ?></div>
    <div class="type"><?php echo $member->getStatusDisplay() ?></h4>
    </div>
</div>