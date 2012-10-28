<?php $eventAttendees = $event->getAttendees(); ?>
<?php if ($eventAttendees->count() > 0): ?>
    <div class="peer-block plain-row padding-10">
        <?php foreach ($eventAttendees as $eventAttendee): ?>
            <?php $user = $eventAttendee->getUser() ?>
            <div class="peer" id="event-attendee-<?php echo $eventAttendee->getId() ?>">
                <?php include_partial('personal_info/photo', array('user' => $user, "dimension" => 36)) ?>
                <div class="name"><?php echo link_to($user, 'profile_show', $user) ?></div>
                <div class="type"><?php echo $user->getType() ?></h4>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="no-result">There's no attendees invited to this event currently</div>
<?php endif; ?>