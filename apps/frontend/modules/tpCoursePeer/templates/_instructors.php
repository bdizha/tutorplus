<?php if ($courseInstructorProfiles->count() > 0): ?>
  <?php foreach ($courseInstructorProfiles as $key => $profile): ?>
    <div class="peer<?php echo fmod($key, 2) ? " last" : "" ?>"> 
      <?php include_partial('tpPersonalInfo/photo', array('profile' => $profile, "dimension" => 36)) ?>
      <div class="name"><?php echo link_to($profile->getTitle() . " " . $profile->getName(), 'profile_show', $profile) ?></div>
      <div class="institution"><?php echo $profile->getInstitution() ?></div>
    </div>
  <?php endforeach; ?>
<?php else: ?>
  <div class="no-result">There isn't any instructors assigned to this course yet</div>
<?php endif; ?>