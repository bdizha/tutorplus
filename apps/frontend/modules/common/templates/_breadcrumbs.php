<?php if (count($breadcrumbs) > 0): ?>
    <?php $counter = 0; ?>
    <div id="breadcrumbs">
        <ol>
            <?php foreach ($breadcrumbs as $title => $routeSuffix): ?>
                <?php $counter++; ?>
                <li class="<?php echo ($counter == 1) ? 'first' : 'after'; ?>">
                    <a id="<?php echo ($counter == 1) ? 'first' : ''; ?>" href="/<?php echo $routeSuffix; ?>"><?php echo myToolkit::shortenString($title, 50); ?></a>          
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
<?php endif; ?>