<?php slot('breadcrumbs') ?>
<?php if (count($breadcrumbs) > 0): ?>
    <?php $counter = 1; ?>
    <?php $totalCount = count($breadcrumbs); ?>
    <div id="breadcrumbs">
        <?php foreach ($breadcrumbs as $title => $routeSuffix): ?>
            <a href = "/<?php echo $routeSuffix; ?>"><?php echo myToolkit::shortenString($title, 50); ?></a>
            <?php if ($counter != $totalCount): ?>
                <span>/</span>
            <?php endif; ?>
            <?php $counter++; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<?php end_slot() ?>