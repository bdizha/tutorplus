<div class="peer" id="discussion-member-<?php echo $member->getId() ?>">
    <?php include_partial('personal_info/photo', array('user' => $member->getUser(), "dimension" => 36)) ?>
    <div class="name"><?php echo $member->getNickname() ?></div>
    <div class="type"><?php echo $member->getStatusDisplay() ?></div>
</div>