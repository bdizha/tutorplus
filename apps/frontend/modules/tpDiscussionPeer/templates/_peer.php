<div class="peer" id="discussion-group-peer-<?php echo $peer->getId() ?>">
    <?php include_partial('tpPersonalInfo/photo', array('profile' => $peer->getProfile(), "dimension" => 36)) ?>
    <div class="name"><?php echo link_to($peer->getProfile(), 'profile_show', $peer->getProfile()) ?></div>
    <div class="type"><?php echo DiscussionPeerTable::$display_statuses[$peer->getStatus()]  ?>
    </div>
</div>