<?php if (count($courses) == 0): ?>
    <div class="no-result">There's currently no courses assigned.</div>
<?php endif; ?>
<?php foreach ($courses as $course): ?>
    <div class="student-item">
        <div class="image">
            <img alt="<?php echo $course->getName() ?>" src="/images/small-icon.hover.png">
        </div>
        <div class="info">
            <div class="name"><?php echo link_to($course->getName(), 'course_show', $course) ?></div>
        </div>
        <div class="student-item-year">
            <span><?php echo date("M jS Y", strtotime($course["start_date"])) ?> - <?php echo date("M jS Y", strtotime($course["end_date"])) ?></span>
        </div>
    </div>
<?php endforeach; ?> 