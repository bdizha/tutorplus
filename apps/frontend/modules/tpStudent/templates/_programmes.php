<?php if (count($programmes) == 0): ?>
    <div class="no-result">There's currently no programmes assigned.</div>
<?php else: ?>
    <div  class="full-block">
        <?php foreach ($programmes as $program): ?>
            <div class="student-item even-background">
                <div class="image">
                    <img alt="<?php echo $program["name"] ?>" src="/images/small-icon.hover.png">
                </div>
                <div class="info">
                    <div class="name"><?php echo $program["name"] ?></div>
                </div>
            </div>
        <?php endforeach; ?> 
    </div>
<?php endif; ?>