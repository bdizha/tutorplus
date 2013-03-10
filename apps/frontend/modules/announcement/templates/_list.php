<?php foreach ($announcements as $announcement): ?>
    <?php include_partial('announcement/announcement', array('announcement' => $announcement, "helper" => $helper)) ?>
<?php endforeach; ?>