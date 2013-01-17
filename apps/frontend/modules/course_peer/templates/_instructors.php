<?php if ($courseInstructors->count() > 0): ?>
  <?php foreach ($courseInstructors as $courseInstructor): ?>
    <div class="peer"> 
      <?php $profile = $courseInstructor->getProfile() ?>
      <?php include_partial('personal_info/photo', array('profile' => $profile, "dimension" => 48)) ?>
      <div class="name"><?php echo link_to($profile->getTitle() . " " . $profile->getName(), 'profile_show', $profile) ?></div>
    </div>
  <?php endforeach; ?>
<?php else: ?>
  <div class="course-row">There's not any instructors assigned to this course yet</div>
<?php endif; ?>