<?php foreach ($peers as $key => $peer): ?>
    <?php if ($peer->getInviteeId() == $sf_user->getId()): ?>
        <?php $profile = $peer->getInviter(); ?>
    <?php else: ?>
        <?php $profile = $peer->getInvitee(); ?>
    <?php endif; ?>
    <?php $cssClass = fmod($key + 1, 3) == 0 ? "last-photo" : null; ?>
    <?php include_partial('tpPersonalInfo/photo', array('profile' => $profile, "dimension" => 36, "cssClass" => $cssClass)) ?>
<?php endforeach; ?>