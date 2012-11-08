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
    <div id="sf_admin_content">
        <div class="content-block">
            <h2>Assignment Info <?php echo $helper->showToEdit($assignment) ?></h2>
            <div class="full-block">
                <div class="assignment_info">
                    <div class="even-row">
                        <div class="row-column">
                            <div class="row-label">
                                Points:
                            </div>
                            <div class="row-value">
                                <?php echo $assignment->getPoints() ?>                
                            </div>
                        </div>
                        <div class="row-column">
                            <div class="row-label">
                                Weight:
                            </div>
                            <div class="row-value">
                                <?php echo $assignment->getWeight() ?>
                            </div>
                        </div>
                    </div>
                    <div class="even-row">
                        <div class="row-column">
                            <div class="row-label">
                                Due Date:
                            </div>
                            <div class="row-value">
                                <?php echo $assignment->getDueDate() ?>                
                            </div>
                        </div>
                        <div class="row-column">
                            <div class="row-label">
                                Is Graded:
                            </div>
                            <div class="row-value">
                                <?php echo $assignment->getIsGraded() ? "Yes" : "No" ?>
                            </div>
                        </div>
                    </div>
                    <div class="even-row">
                        <div class="row-column">
                            <div class="row-label">
                                Submission:
                            </div>
                            <div class="row-value">
                                <?php echo $assignment->getDisplaySubmission() ?>                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-block">
            <h2>Assignment Description</h2>
            <div class="full-block padding-10 plain-row">
                <?php echo $assignment->getHtmlizedDescription() ?>
            </div>
        </div>
        <div class="content-block">
            <div class="full-block" id="my_assignment_grades">
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
            </div>
        </div>
        <div class="content-block">
            <div class="full-block" id="my_assignment_grades">
                <h2>My Submission(s)</h2>
                <div id="assignment_submissions"></div>
                <ul class="sf_admin_actions">
                    <li class="sf_admin_action_upload_assignment">
                        <input type="button" id="upload_assignment" class="button" value="Upload Assignment"/>
                    </li>
                    <li class="sf_admin_action_assign_grades">
                        <input type="button" class="button" value="Assign Grades" onclick="document.location.href='/gradebook';" />
                    </li>
                </ul>
            </div>
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
            openPopup('/assignment_submission/new', '600px', "500px", "<?php echo __('Add Assignment Submission', Array(), 'messages') ?>");
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
        $.get('/assignment_submission', showAssignmentSubmissions);
    }

    function showAssignmentSubmissions(res){
        $('#assignment_submissions').html(res);
    }
</script>