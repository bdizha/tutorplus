<?php if ($courseStudents->count() > 0): ?>
  <?php foreach ($courseStudents as $key => $courseStudent): ?>
    <div class="peer<?php echo fmod($key, 2) ? " last" : "" ?>"> 
      <?php $profile = $courseStudent->getProfile() ?>
      <?php include_partial('personal_info/photo', array('profile' => $profile, "dimension" => 48)) ?>
      <div class="name"><?php echo link_to($profile->getTitle() . " " . $profile->getName(), 'profile_show', $profile) ?></div>
      <div class="institution"><?php echo $profile->getInstitution() ?></div>
    </div>
  <?php endforeach; ?>
<?php else: ?>
  <div class="course-row">There's not any students enrolled into this course yet</div>
<?php endif; ?>