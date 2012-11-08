<?php if (count($courses) == 0): ?>
    <div class="no-result">There's currently no courses assigned.</div>
<?php endif; ?>
<?php foreach ($courses as $course): ?>
    <div class="instructor-item even-background">
        <div class="image">
            <img alt="<?php echo $course["name"] ?>" src="/images/small-icon.hover.png">
        </div>
        <div class="info">
            <div class="name"><?php echo $course["name"] ?></div>
        </div>
        <div class="instructor-item-year">
            <span>2012</span>
        </div>
    </div>
<?php endforeach; ?> 