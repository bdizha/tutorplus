<?php if (count($publications) == 0): ?>
    <div class="no-result">There's currently no publications added.</div>
<?php endif; ?>
<?php foreach ($publications as $publication): ?>
    <div class="even-row">
        <?php echo $publication->getTitle() ?> <?php echo ($publication->getYear()) ? " - " . $publication->getYear() : "" ?>
    </div>
<?php endforeach; ?>