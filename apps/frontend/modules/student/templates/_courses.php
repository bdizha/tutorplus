<?php if (count($courses) == 0): ?>
    <div class="no-result">There's currently no courses assigned.</div>
<?php endif; ?>
<?php foreach ($courses as $course): ?>
    <div class="student-item">
        <div class="image">
            <img alt="<?php echo $course->getName() ?>" src="/images/course-icon.png">
        </div>
        <div class="info">
            <div class="name"><?php echo link_to($course->getName(), 'course_show', $course) ?></div>
        </div>
        <div class="student-item-year">
            <span><?php echo date("M jS Y", strtotime($course["start_date"])) ?> - <?php echo date("M jS Y", strtotime($course["end_date"])) ?></span>
            <div class="enroll"><input class="enroll" courseid="<?php echo $course->getId() ?>" value="Enroll now" type="button"/></div>
        </div>
    </div>
<?php endforeach; ?>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){  
        $(".enroll").click(function(){
            alert("testing...");
            var courseId = $(this).attr("courseid");
            $.get('/course/enroll/' + courseId, {}, function(response){
                alert(response);
                if(response == "success"){
                    document.location.href='/my/courses';
                }
                else{
                    document.location.href='/explore/courses';
                }
            }, 'html');
        });
    });
    //]]
</script>