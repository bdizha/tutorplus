<?php if (count($mailingLists) == 0): ?>
    <div class="no-result">There's currently no mailing lists assigned.</div>
<?php endif; ?>
<?php foreach ($mailingLists as $mailingList): ?>
    <div class="instructor-item even-background">
        <div class="image">
            <img alt="<?php echo $mailingList["name"] ?>" src="/images/small-icon.hover.png">
        </div>
        <div class="info">
            <div class="name"><?php echo $mailingList["name"] ?></div>
        </div>
    </div>
<?php endforeach; ?>