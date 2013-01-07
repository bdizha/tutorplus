<?php $members = $discussion->retrieveMembers(); ?>
<?php if ($members->count() > 0): ?>
    <?php foreach ($members as $member): ?>
        <div class="participant">
            <?php include_partial('personal_info/photo', array('profile' => $member->getProfile(), "dimension" => 36)) ?>
        </div>  
    <?php endforeach; ?>
    <div class="clear">&nbsp;</div>
<?php else: ?>
    <div class="no-result">There's no followers.</div>
<?php endif; ?>