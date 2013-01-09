<div class="enroll-block">
  <div class="enroll-student">
    <input class="button" value="Enroll as a Student!" type="button" onclick="document.location.href = '<?php echo url_for('@student_enroll_new') ?>';"/>
  </div>
  <div class="enroll-insructor">
    <input class="button" value="Enroll as an Instructor!" type="button" onclick="document.location.href = '<?php echo url_for('@instructor_enroll_new') ?>';"/>
  </div>
</div>