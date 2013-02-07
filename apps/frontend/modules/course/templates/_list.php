<?php if (count($courses) == 0): ?>
    <div class="no-result">There's no courses available.</div>
<?php else: ?>
    <?php $isAuthenticated = $sf_user->isAuthenticated() ?>
    <?php if ($isAuthenticated): ?>
        <?php $profile = $sf_user->getProfile() ?>
    <?php endif; ?>
    <?php foreach ($courses as $course): ?>
        <div class="course-catalog">
            <div class="heading">
                <a class="photo-link" style="width:96px;height:96px;" href="/batanayi-matuku">
                    <img src="/uploads/users/3/normal-96.jpg" class="image" alt="Musavengana Zirebwa" title="Musavengana Zirebwa">
                </a>
                <div class="name"><?php echo link_to($course->getCode(), 'course_show', $course) ?> - <?php echo$course->getName() ?></div>
            </div>
            <div class="body">
                <div class="course-info">
                    <span>Active dates: </span>
                    <span class="datetime">
                        <?php echo date("M, j Y", strtotime($course["start_date"])) ?> - <?php echo date("M, j Y", strtotime($course["end_date"])) ?>
                    </span>          
                </div>
                <div class="course-info">
                    <span>Institution:</span>
                    <span class="institution">University of Cape Town</span>
                </div>
                <?php if ($isAuthenticated && $profile->isEnrolled($course->getId())): ?>
                    <div class="button-box-enter course-action">
                        <input class="enrolled" title="Enter Course!" href="/my/course/<?php echo $course->getSlug() ?>" value="Enter Course!" type="button"/>
                    </div>
                <?php else: ?>
                    <div class="button-box-enroll course-action">
                        <input class="course-enroll" title="+ Enroll Now!" href="/my/course/<?php echo $course->getSlug() ?>" courseid="<?php echo $course->getId() ?>" value="+ Enroll Now!" type="button"/>
                    </div>                        
                <?php endif; ?>
            </div>          
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){
        $(".course-enroll").click(function(){
        <?php if (!$isAuthenticated): ?>
            document.location.href = $(this).attr("href");  
            return false;
        <?php endif; ?>
            if ($(this).attr("value") !== 'Enrolling...') {
                var courseId = $(this).attr("courseid");
                $(this).attr("value","Enrolling...");

                var $this = $(this);
                $.get('/course/enroll/' + courseId,{},function(response){
                    if (response == "success") {
                        $this.removeClass("course-enroll");
                        $this.addClass("enrolled");
                        $this.parent().removeClass("button-box-enroll");
                        $this.parent().addClass("button-box-enter");

                        $this.attr("value","Enter Course!");
                        reloadWindow();
                    }
                    else{
                        reloadWindow();
                    }
                },'html');
            }
        });

        $(".enrolled").click(function(){
            document.location.href = $(this).attr("href");
        })
    });
    //]]
</script>