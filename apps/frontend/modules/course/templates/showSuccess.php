<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->getShowLinks($course)) ?>
<?php include_partial('common/breadcrumbs', $helper->getShowBreadcrumbs($course)) ?>
<div class="sf_admin_heading">
	<h3>
		<?php include_partial('course/photo', array('course' => $course, "dimension" => 24)) ?>
		<?php echo __('%%code%% ~ %%name%%', array('%%code%%' => $course->getCode(), '%%name%%' => $course->getName()), 'messages') ?>
	</h3>
</div>
<?php include_partial('common/flashes_normal') ?>
<div id="sf_admin_content">
	<div class="content-block">
		<?php include_partial('common/tabs', array('tabs' => $helper->getShowTabs($course, "info"))) ?>
		<div class="tab-block">
			<?php include_partial('course/course', array('course' => $course)) ?>
			<h4>Instructors</h4>
			<div class="courses-instructors">
				<?php include_partial('course_peer/instructors', array('courseInstructorProfiles' => $courseInstructorProfiles)) ?>
			</div>
			<h4>What is this course about?</h4>
			<div class="courses-row">
				<?php echo $course->getDescription() ?>
			</div>
		</div>
		<?php include_partial('common/actions', $helper->getShowActions()) ?>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".sf_admin_action_manage_instructors input").click(function(){
            openPopup("/choose/course/instructors",'513px','480px',"<?php echo __('Manage Course Instructors', Array(), 'messages') ?>");
            return false;
        });
        $(".enroll").click(function(){
            <?php if (!$sf_user->isAuthenticated()): ?>
                document.location.href = $(this).attr("href");  
                return false;
            <?php endif; ?>
                if ($(this).attr("value") !== 'Enrolling...') {
                    $(this).attr("value", "Enrolling...");
                    var $this = $(this);
                    $.get($(this).attr("href"), {}, function(response){
                        if (response == "success") {
                            $this.removeClass("enroll");
                            $this.addClass("unregister");
                            $this.parent().removeClass("button-box-enroll");
                            $this.parent().addClass("button-box-unregister");

                            $this.attr("value", "Unregister Course!");
                            reloadWindow();
                        }
                        else{
                            reloadWindow();
                        }
                    },'html');
                }
        });

        $(".unregister").click(function(){
        	if ($(this).attr("value") !== 'Unregistering...') {
                $(this).attr("value", "Unregistering...");
                var $this = $(this);
                $.get($(this).attr("href"), {}, function(response){
                    if (response == "success") {
                        $this.addClass("enroll");
                        $this.removeClass("unregister");
                        $this.parent().addClass("button-box-enroll");
                        $this.parent().removeClass("button-box-unregister");

                        $this.attr("value", "+ Enroll Now!");
                        reloadWindow();
                    }
                    else{
                        reloadWindow();
                    }
                },'html');
            }
        })
    });

    function fetchCourseInstructors(){
        $('#course_instructors').html(loadingHtml);
        $.get('/course/instructor',showCourseInstructors);
    }

    function showCourseInstructors(res){
        $('#course_instructors').html(res);
    }
</script>
