<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_secondary', array("item_level_1" => "dashboard_course", "item_level_2" => "course_home", "Course Home", "current_route" => "course_show")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Dashboard" => "dashboard", "My Courses" => "my_courses",  "Course ~ "  . $course->getCode() => "course/" . $course->getId()))) ?>
<?php end_slot() ?>
<div class="sf_admin_heading">
    <h3><?php echo __('%%code%% - %%name%%', array('%%code%%' => $course->getCode(), '%%name%%' => $course->getName()), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">
    <div id="sf_admin_content">
        <div class="section_description">
            <p><?php echo $course->getDescription() ?></p>
        </div>
        <ul class="sf_admin_actions" style="clear:both">
            <li class="sf_admin_actions_my_courses">
                <input type="button" class="button" onclick="document.location.href='/backend.php/course';" value="< My Courses"/>
            </li>
            <li class="sf_admin_actions_course_assignments">
                <input type="button" class="button" onclick="document.location.href='/backend.php/assignment';" value="Course Assignments"/>
            </li>
        </ul>
        <div class="content-block">
            <div class="left-block">
                <h2>Course Info</h2>
                <div class="course_info">
                    <div class="course-row">
                        <div class="attribute-label">
                            Department
                        </div>
                        <div class="attribute-value">
                            <?php echo $course->getDepartment() ?>                 
                        </div>
                    </div>
                    <div class="course-row">
                        <div class="attribute-label">
                            Course dates
                        </div>
                        <div class="attribute-value">
                            <?php echo $course->getDateTimeObject('start_date')->format('d/m/Y') ?> - <?php echo $course->getDateTimeObject('end_date')->format('d/m/Y') ?>                  
                        </div>
                    </div>
                    <div class="course-row">
                        <div class="attribute-label">
                            Is finalized
                        </div>
                        <div class="attribute-value">
                            <?php echo $course->getIsFinalized() ?>                 
                        </div>
                    </div>
                    <div class="course-row">
                        <div class="attribute-label">
                            Credits
                        </div>
                        <div class="attribute-value">
                            <?php echo $course->getCredits() ?>                 
                        </div>
                    </div>
                    <div class="course-row">
                        <div class="attribute-label">
                            Duration
                        </div>
                        <div class="attribute-value">
                            <?php echo $course->getHours() ?> hrs             
                        </div>
                    </div>
                    <div class="course-row">
                        <div class="attribute-label">
                            Max enrolled
                        </div>
                        <div class="attribute-value">
                            <?php echo $course->getMaxEnrolled() ?> students              
                        </div>
                    </div>                    
                </div>
            </div>
            <div class="right-block">
                <h2>Meeting Times</h2>
                <div id="course_meeting_times"></div>
            </div>
        </div>
        <div class="content-block">
            <h2>Upcoming Assignments</h2>
            <div id="upcoming_assigments">
                <?php $upcomingAssignments = $course->retrieveUpcomingAssignments() ?>
                <?php if ($upcomingAssignments->count() > 0): ?>                            
                    <?php foreach ($upcomingAssignments as $assignment): ?>
                        <div class="assignment">
                            <div class="inline-block">
                                <div class="image">
                                    <img alt="Precious Mugaragumbo" src="/uploads/users/6/avatar_36.png">
                                </div>
                            </div>
                            <div class="inline-block assignment-details">
                                <h4 class="title"><?php echo $assignment->getTitle() ?></h4>
                                <div class="body"><?php echo $assignment->getDescription() ?> <a class="read-more" href="/backend.php/assignment/<?php echo $assignment->getId() ?>">Read More</a></div>
                                <div class="assignment_meta">
                                    <span class="datetime">Due on: <?php echo false !== strtotime($assignment->getDueDate()) ? format_date($assignment->getDueDate(), "d-M-y H:m a") : "" ?> by</span> <a href="/backend.php/profile">Batanayi Matuku</a>		      					
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    There's no upcoming assignments
                <?php endif; ?>
            </div>
        </div>
        <ul class="sf_admin_actions" style="clear:both">
            <li class="sf_admin_actions_my_courses">
                <input type="button" class="button" onclick="document.location.href='/backend.php/course';" value="< My Courses"/>
            </li>
            <li class="sf_admin_actions_course_assignments">
                <input type="button" class="button" onclick="document.location.href='/backend.php/assignment';" value="Course Assignments"/>
            </li>
        </ul>
    </div>
</div>
<script type='text/javascript'>
    $(document).ready(function(){
        $("#edit_course").click(function(){
            $("#sf_admin_container").load($(this).attr("popup_url"));
        });
	
        fetchCourseMeetingTimes();
    });

    function fetchCourseMeetingTimes(){
        $('#course_meeting_times').html(loadingHtml);
        $.get('/backend.php/course_meeting_time', showCourseMeetingTimes);
    }

    function showCourseMeetingTimes(res){
        $('#course_meeting_times').html(res);
    }
</script>