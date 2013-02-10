<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->getShowLinks($course)) ?>
<?php include_partial('common/breadcrumbs', $helper->getShowBreadcrumbs($course)) ?>
<div class="sf_admin_heading">
	<h3>
		<?php echo __('%%code%% ~ %%name%%', array('%%code%%' => $course->getCode(), '%%name%%' => $course->getName()), 'messages') ?>
	</h3>
</div>
<?php include_partial('common/flashes_normal') ?>
<div id="sf_admin_content">
	<div class="content-block">
		<?php include_partial('common/tabs', array('tabs' => $helper->getShowTabs($course, $courseDiscussionGroups))) ?>
		<div class="tab-block">
			<div class="snapshot">
				<div class="course-image">
					<img src="/profile/show/photo/3/128/1357767921" class="image"
						alt="<?php echo $course->getCode() ?>"
						title="<?php echo $course->getCode() ?>">
					<div class="course-action-bottom">
						<?php if ($profile->isEnrolled($course->getId())): ?>
						<div class="button-box-unregister course-action">
							<input class="unregister" title="Enter Course!"
								href="/course/unregister/<?php echo $course->getId() ?>"
								value="Unregister Course!" type="button" />
						</div>
						<?php else: ?>
						<div class="button-box-enroll course-action">
							<input class="enroll" title="+ Enroll Now!"
								href="/course/enroll/<?php echo $course->getId() ?>"
								value="+ Enroll Now!" type="button" />
						</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="course-info">
					<div class="course-row">
						<div class="row-label">Institution:</div>
						<div class="row-value">
							<?php echo $course->getDepartment()->getFaculty()->getInstitution() ?>
						</div>
					</div>
					<div class="course-row">
						<div class="row-label">Department:</div>
						<div class="row-value">
							<?php echo $course->getDepartment() ?>
						</div>
					</div>
					<div class="course-row">
						<div class="row-label">Active dates:</div>
						<div class="row-value">
							<?php echo $course->getDateTimeObject('start_date')->format('M jS Y') ?>
							-
							<?php echo $course->getDateTimeObject('end_date')->format('M jS Y') ?>
						</div>
					</div>
					<div class="course-row">
						<div class="row-label">Is active:</div>
						<div class="row-value">
							<?php echo $course->getIsFinalized() ? "Yes" : "No" ?>
						</div>
					</div>
					<div class="course-row">
						<div class="row-label">Duration:</div>
						<div class="row-value">
							<?php echo (int) ($course->getHours() / 24 / 7) ?>
							weeks long
						</div>
					</div>
					<div class="course-row">
						<div class="row-label">Max enrolled:</div>
						<div class="row-value">
							<?php echo $course->getMaxEnrolled() ?>
							students
						</div>
					</div>
				</div>
			</div>
			<div class="snapshot">
				<h3>What is this course about?</h3>
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
