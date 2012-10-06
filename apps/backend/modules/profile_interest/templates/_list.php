<?php if (count($interests) == 0): ?>
    <div class="no-result">There's currently no interests specified.</div>
<?php endif; ?>
<?php foreach ($interests as $interest): ?>
    <div class="even-row"><?php echo $interest->getName() ?></div>
<?php endforeach; ?>