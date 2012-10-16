<div class="peer" id="discussion-member-<?php echo $member->getId() ?>">
<<<<<<< HEAD
    <?php include_partial('personal_info/photo', array('user' => $member->getUser(), "dimension" => 36)) ?>
    <div class="name"><?php echo $member->getNickname() ?></div>
    <div class="type"><?php echo $member->getStatusDisplay() ?></div>
=======
    <?php include_partial('personal_info/photo', array('user' => $member->getUser(), "dimension" => 48)) ?>
    <div class="name"><?php echo link_to($member->getNickname(), 'profile_show', $member->getUser()) ?></div>
    <div class="type"><?php echo $member->getStatusDisplay() ?></h4>
    </div>
>>>>>>> development
</div>