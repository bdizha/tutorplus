<?php if (count($announcements) == 0): ?>
    <div class="no-result">There's no announcements.</div>
<?php endif; ?>
<?php foreach ($announcements as $announcement): ?>
    <div class="even-row">
        <?php include_partial('personal_info/photo', array('user' => $announcement->getUser(), "dimension" => 36)) ?>
        <?php echo link_to($announcement->getSubject(), 'announcement_show', $announcement) ?>   
    </div> 
<?php endforeach; ?>