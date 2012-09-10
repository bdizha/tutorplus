<?php if(counter($breadcrumbs) > 0): ?>
<div class="breadcrumb">
    <div id="current_path">
        <?php $counter = 0; ?>
        <?php foreach ($breadcrumbs as $title => $route_suffix): ?>
            <?php $counter++; ?>
            <a id="<?php echo ($counter == count($breadcrumbs)) ? 'first' : ''; ?>" href="/backend.php/<?php echo $route_suffix; ?>"><?php echo $title; ?></a>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>