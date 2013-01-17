<?php if ($courseStudents->count() > 0): ?>
  <?php foreach ($courseStudents as $courseStudent): ?>
    <div class="peer"> 
      <?php $profile = $courseStudent->getProfile() ?>
      <?php include_partial('personal_info/photo', array('profile' => $profile, "dimension" => 48)) ?>
      <div class="name"><?php echo link_to($profile->getTitle() . " " . $profile->getName(), 'profile_show', $profile) ?></div>
    </div>
  <?php endforeach; ?>
<?php else: ?>
  <div class="course-row">There's not any students enrolled into this course yet</div>
<?php endif; ?>