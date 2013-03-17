<?php $isAuthenticated = $sf_user->isAuthenticated() ?>
<?php if (count($courses) == 0): ?>
    <div class="no-result">There isn't any active courses available yet.</div>
<?php else: ?>
    <?php foreach ($courses as $course): ?>
        <?php include_partial('tpCourse/course', array('course' => $course, "isPublic" => isset($isPublic), "isAuthenticated" => $isAuthenticated)) ?>
    <?php endforeach; ?>
<?php endif; ?>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){
        $(".enroll").live("click", function(){
<?php if (!$isAuthenticated): ?>
                        document.location.href = $(this).attr("href");  
                        return false;
<?php endif; ?>
                    if ($(this).attr("value") !== 'Enrolling...') {
                        $(this).attr("value", "Enrolling...");
                        var $this = $(this);
                        var url = "/course/" + $(this).attr("action") + "/" + $(this).attr("courseid");
                        $.get(url, {}, function(response){
                            if (response.status == "success") {
                                showSuccess(response.notice);
                                $this.removeClass("enroll");
                                $this.addClass("enter");
                                $this.parent().removeClass("button-box-enroll");
                                $this.parent().addClass("button-box-enter");
                                $this.attr("value", "Enter Course!");
                            }
                            else{
                                showFailure(response.notice);
                            }
                        },'json');
                    }
                });

                $(".unregister").live("click", function(){
                    if ($(this).attr("value") !== 'Unregistering...') {
                        $(this).attr("value", "Unregistering...");
                        var $this = $(this);
                        var url = "/course/" + $(this).attr("action") + "/" + $(this).attr("courseid");
                        $.get(url, {}, function(response){
                            if (response.status == "success") {
                                showSuccess(response.notice);
                                $this.attr("action", "enroll");
                                $this.addClass("enroll");
                                $this.removeClass("unregister");
                                $this.parent().addClass("button-box-enroll");
                                $this.parent().removeClass("button-box-unregister");
                                $this.attr("value", "+ Enroll Now!");
                            }
                            else{
                                showFailure(response.notice);
                            }
                        },'json');
                    }
                });        

                $(".enter").live("click", function(){
                    document.location.href = $(this).attr("href");
                })
            });
            //]]
</script>
