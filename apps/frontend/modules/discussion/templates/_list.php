<div class="full-block">
    <?php if (!$pager->getNbResults()): ?>
        <div class="no-result">
            <?php echo __("There's no discussions started currently.", array(), 'sf_admin') ?>
        </div>
    <?php else: ?>  
        <div id="discussions">
            <?php foreach ($pager->getResults() as $i => $discussion): $odd = fmod(++$i, 2) ? 'odd' : 'even' ?>
                <?php include_partial('discussion/discussion', array('discussion' => $discussion, "helper" => $helper)) ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>