<?php if (count($announcements) == 0): ?>
    <div class="no-result">There's no announcements.</div>
<?php endif; ?>
<?php foreach ($announcements as $announcement): ?>
    <div class="even-row">
        <div class="clear">
            <?php include_partial('personal_info/photo', array('user' => $announcement->getUser(), "dimension" => 36)) ?>
            <?php echo link_to($announcement->getSubject(), 'discussion_show', $announcement) ?>            
        </div>
    </div> 
<?php endforeach; ?>