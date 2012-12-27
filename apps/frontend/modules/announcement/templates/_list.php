<?php if (!$pager->getNbResults()): ?>
    <div class="no-result">
        <?php echo __("There's no announcements currently.", array(), 'sf_admin') ?>
    </div>
<?php else: ?>  
    <div id="announcements">
        <?php foreach ($pager->getResults() as $i => $announcement): $odd = fmod(++$i, 2) ? 'odd' : 'even' ?>
            <?php include_partial('announcement/announcement', array('announcement' => $announcement, "helper" => $helper)) ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>