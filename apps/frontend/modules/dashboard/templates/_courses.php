<?php if (count($courses) == 0): ?>
<div class="no-result">You've not been enrolled in to any course yet.</div>
<?php endif; ?>
<?php foreach ($courses as $course): ?>
<div class="timeline-row">
	<div class="heading">
		<?php include_partial('course/photo', array('course' => $course, "dimension" => 24)) ?>
		<?php echo link_to($course->getName() . " ~ (" . $course->getCode() . ")", 'course_show', $course) ?>
	</div>
	<div class="body">
		<span>Active dates:</span> <span class="datetime"> <?php echo date("M jS, Y", strtotime($course["start_date"])) ?>
			- <?php echo date("M jS, Y", strtotime($course["end_date"])) ?>
		</span>
	</div>
</div>
<?php endforeach; ?>