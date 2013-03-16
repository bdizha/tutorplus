<?php foreach ($announcements as $announcement): ?>
    <?php include_partial('tpAnnouncement/announcement', array('announcement' => $announcement, "helper" => $helper)) ?>
<?php endforeach; ?>