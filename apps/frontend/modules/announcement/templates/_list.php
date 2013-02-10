<?php if (!$announcements->count()): ?>
<?php echo __("There isn't any announcements made yet.", array(), 'sf_admin') ?>
<?php else: ?>  
  <?php foreach ($announcements as $announcement): ?>
    <?php include_partial('announcement/announcement', array('announcement' => $announcement, "helper" => $helper)) ?>
  <?php endforeach; ?>
<?php endif; ?>