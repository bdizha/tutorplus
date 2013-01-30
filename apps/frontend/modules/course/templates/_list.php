<?php if (count($courses) == 0): ?>
  <div class="no-result">There's no courses available.</div>
<?php else: ?>
  <?php foreach ($courses as $course): ?>
    <div class="course-catalog">
      <div class="heading">
        <a class="photo-link" style="width:96px;height:96px;" href="/profile/musavengana-zirebwa"><img src="/profile/show/photo/3/96/1357352576" class="image" alt="Musavengana Zirebwa" title="Musavengana Zirebwa"></a>
        <div class="name"><?php echo link_to($course->getCode(), 'course_show', $course) ?> - <?php echo$course->getName() ?></div>
      </div>
      <div class="body">
        <div class="course-info">
          <span>Active dates: </span>
          <span class="datetime">
            <?php echo date("M jS Y", strtotime($course["start_date"])) ?> - <?php echo date("M jS Y", strtotime($course["end_date"])) ?>
          </span>          
        </div>
        <div class="course-info">
          <span>Institution:</span>
          <span class="institution">
            University of Cape Town
          </span>
        </div>
        <?php if ($profile->isEnrolled($course->getId())): ?>
          <div class="button-box-enter course-action">
            <input class="enrolled" title="Enter course!" href="/my/course/<?php echo $course->getSlug() ?>" value="Enter course!" type="button"/>
          </div>
        <?php else: ?>
          <div class="button-box-enroll course-action">
            <input class="course-enroll" title="+ Enroll Now!" courseid="<?php echo $course->getId() ?>" value="+ Enroll Now!" type="button"/>
          </div>                        
        <?php endif; ?>
      </div>          
    </div>
  <?php endforeach; ?>
<?php endif; ?>
<script type='text/javascript'>
  //<![DATA[
  $(document).ready(function() {
    $(".course-enroll").click(function() {
      var courseId = $(this).attr("courseid");
      $.get('/course/enroll/' + courseId, {}, function(response) {
        document.location.href = '/explore/courses';
      }, 'html');
    });

    $(".enrolled").click(function() {
      document.location.href = $(this).attr("href");
    })
  });
  //]]
</script>