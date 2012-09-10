<?php if (count($breadcrumbs) > 0): ?>
    <?php $counter = 0; ?>
    <div id="breadcrumbs">
        <ol>
            <?php foreach ($breadcrumbs as $title => $route_suffix): ?>
                <?php $counter++; ?>
                <li>
                    <a id="<?php echo ($counter == 1) ? 'first' : ''; ?>" href="/backend.php/<?php echo $route_suffix; ?>"><?php echo $title; ?></a>          
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
<?php endif; ?>