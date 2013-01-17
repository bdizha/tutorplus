<?php if (!$pager->getNbResults()): ?>
    <div class="no-result"><?php echo __("There's no discussions started currently.", array(), 'sf_admin') ?></div>
<?php else: ?>  
    <div id="discussions">
        <?php foreach ($pager->getResults() as $i => $discussion): $odd = fmod(++$i, 2) ? 'odd' : 'even' ?>
            <div class="snapshot discussion"><?php include_partial('course_discussion/discussion', array('discussion' => $discussion, "helper" => $helper)) ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>