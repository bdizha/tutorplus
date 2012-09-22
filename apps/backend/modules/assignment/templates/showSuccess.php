<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->showLinks($assignment)) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->showBreadcrumbs($assignment)) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3>Assignment ~ <?php echo $assignment->getTitle() ?></h3>
</div>
<div id="sf_admin_form_container">
    <div class="section_description">
        <p><?php echo $assignment->getDescription() ?></p>
    </div>
    <ul class="sf_admin_actions">
        <li class="sf_admin_action_my_assignment">
            <input type="button" class="button" onclick="document.location.href='/backend.php/assignment';" value="< My Assignments">
        </li>
        <li class="sf_admin_action_my_course">
            <input type="button" class="button" onclick="document.location.href='/backend.php/course/<?php echo $course->getId() ?>'" value="< My Course">
        </li>
        <li class="sf_admin_action_edit_assignment">
            <input type="button" class="button" popup_url="/backend.php/assignment/<?php echo $assignment->getId() ?>/edit" value="Edit Assignment" />
        </li>
    </ul>
    <div class="content-block">
        <div class="left-block">
            <h2>Assignment Info</h2>
            <div class="assignment_info">
                <div class="assignment-row">
                    <div class="attribute-label">
                        Points
                    </div>
                    <div class="attribute-value">
                        <?php echo $assignment->getPoints() ?>                 
                    </div>
                </div>
                <div class="assignment-row">
                    <div class="attribute-label">
                        Weight
                    </div>
                    <div class="attribute-value">
                        <?php echo $assignment->getWeight() ?>                 
                    </div>
                </div>
                <div class="assignment-row">
                    <div class="attribute-label">
                        Due Date
                    </div>
                    <div class="attribute-value">
                        <?php echo $assignment->getDueDate() ?>                 
                    </div>
                </div>
                <div class="assignment-row">
                    <div class="attribute-label">
                        Is Graded
                    </div>
                    <div class="attribute-value">
                        <?php echo $assignment->getIsGraded() ?>                 
                    </div>
                </div>
                <div class="assignment-row">
                    <div class="attribute-label">
                        Submission
                    </div>
                    <div class="attribute-value">
                        <?php echo $assignment->getDisplaySubmission() ?>                 
                    </div>
                </div>                
            </div>            
        </div>
        <div class="right-block">
            <h2>My Assignment Grade</h2>
            <div class="sf_admin_list">
                <table cellspacing="1">
                    <thead>
                        <tr>
                            <th class="sf_admin_text">Mark (%)</th>
                            <th class="sf_admin_text">Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="sf_admin_row even">
                            <td class="sf_admin_text">85%</td>
                            <td class="sf_admin_text">1</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br />
            <h2>My Submission(s)</h2>
            <div id="assignment_submissions"></div>
            <ul class="sf_admin_actions">
                <li class="sf_admin_action_upload_assignment">
                    <input type="button" id="upload_assignment" class="button" value="Upload Assignment"/>
                </li>
                <li class="sf_admin_action_assign_grades">
                    <input type="button" class="button" value="Assign Grades" onclick="document.location.href='/backend.php/gradebook';" />
                </li>
            </ul>
        </div>
    </div>
</div>
<script type='text/javascript'>
    $(document).ready(function(){	
        // fetch the assignment submissions
        fetchAssignmentSubmissions();
        
        $("#course_announcements .edit").click(function(){    
            openPopup($(this).attr("href"), '600px', '510px', "Edit Announcement:");
            return false;
        });
        
        $("#upload_assignment").click(function(){
            openPopup('/backend.php/assignment_submission/new', '600px', "500px", "<?php echo __('Add Assignment Submission', Array(), 'messages') ?>");
            return false;
        });
        
        $(".sf_admin_action_edit_assignment input").click(function(){
            $('.loading').hide();      
            $("#sf_admin_container").html(loadingHtml);
            $("#sf_admin_container").load($(this).attr("popup_url"));
            return false;
        });
    });

    function fetchAssignmentSubmissions(){
        $('#assignment_submissions').html(loadingHtml);
        $.get('/backend.php/assignment_submission', showAssignmentSubmissions);
    }

    function showAssignmentSubmissions(res){
        $('#assignment_submissions').html(res);
    }
</script>