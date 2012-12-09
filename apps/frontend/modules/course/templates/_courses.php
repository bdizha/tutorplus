<?php foreach ($courses as $course): ?>
    <div class="student-item">
        <div class="image">
            <img alt="<?php echo $course["name"] ?>" src="/images/course-icon.png">
        </div>
        <div class="info">
            <div class="name"><?php echo $course["name"] ?></div>
        </div>
        <div class="student-item-year">
            <span>2012</span>
        </div>
    </div>
<?php endforeach; ?> 