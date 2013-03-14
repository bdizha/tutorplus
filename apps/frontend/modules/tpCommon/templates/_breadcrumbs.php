<?php slot('breadcrumbs') ?>
<?php if (count($breadcrumbs) > 0): ?>
    <?php $counter = 1; ?>
    <?php $totalCount = count($breadcrumbs); ?>
    <div id="breadcrumbs">
        <?php foreach ($breadcrumbs as $title => $routeSuffix): ?>
            <?php if ($counter != $totalCount): ?>
                <a href = "/<?php echo $routeSuffix; ?>"><?php echo $title; ?></a>
                <span>&raquo;</span>
            <?php else: ?>
                <?php echo $title; ?>
            <?php endif; ?>
            <?php $counter++; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<?php end_slot() ?>