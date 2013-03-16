<?php if (count($announcements) == 0): ?>
    <div class="no-result">There isn't any announcements yet.</div>
<?php endif; ?>
<?php foreach ($announcements as $announcement): ?>
    <div class="timeline-row">
        <div class="heading">
            <?php include_partial('tpPersonalInfo/photo', array('profile' => $announcement->getProfile(), "dimension" => 36)) ?>
            <?php echo link_to($announcement->getProfile(), 'profile_show', $announcement->getProfile()) ?> announced: 
            <?php echo link_to($announcement->getSubject(), 'announcement') ?> -
            <span class="datetime"><?php echo myToolkit::dateInWords($announcement->getCreatedAt()) ?></span>
        </div>
    </div>
<?php endforeach; ?>