<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->showLinks($course)) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->showBreadcrumbs($course)) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3><?php echo __('%%code%% ~ %%name%%', array('%%code%%' => $course->getCode(), '%%name%%' => $course->getName()), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">
    <div id="sf_admin_content">
        <div class="content-block">
            <h2>Module Info <?php echo $helper->showToEdit($course) ?></h2>
            <div class="full-block">
                <div class="course_info ">
                    <div class="course-row">
                        <div class="row-label">
                            Department:
                        </div>
                        <div class="row-value">
                            <?php echo $course->getDepartment() ?>                 
                        </div>
                    </div>                    
                    <div class="course-row">
                        <div class="row-column">
                            <div class="row-label">
                                Module dates:
                            </div>
                            <div class="row-value">
                                <?php echo $course->getDateTimeObject('start_date')->format('d/m/Y') ?> - <?php echo $course->getDateTimeObject('end_date')->format('d/m/Y') ?>                          
                            </div>
                        </div>
                    </div>
                    <div class="course-row">
                        <div class="row-column">
                            <div class="row-label">
                                Is finalized:
                            </div>
                            <div class="row-value">
                                <?php echo $course->getIsFinalized() ? "Yes" : "No" ?>                 
                            </div>
                        </div>
                        <div class="row-column">
                            <div class="row-label">
                                Credits:
                            </div>
                            <div class="row-value">
                                <?php echo $course->getCredits() ?>                 
                            </div>
                        </div>                        
                    </div>
                    <div class="course-row">
                        <div class="row-column">
                            <div class="row-label">
                                Duration:
                            </div>
                            <div class="row-value">
                                <?php echo $course->getHours() ?> hrs             
                            </div>
                        </div>
                        <div class="row-column">
                            <div class="row-label">
                                Max enrolled:
                            </div>
                            <div class="row-value">
                                <?php echo $course->getMaxEnrolled() ?> students              
                            </div>
                        </div>    
                    </div>                
                </div>
            </div>
        </div>
        <div class="content-block">
            <h2>Course Description</h2>
            <div class="full-block">
                <div class="course-row" id="course_discription">
                    <?php echo $course->getHtmlizedDescription() ?>
                </div>
            </div>
        </div>
        <ul class="sf_admin_actions" style="clear:both">
            <li class="sf_admin_actions_my_courses">
                <input type="button" class="button" onclick="document.location.href='/course';" value="< My Modules"/>
            </li>
            <li class="sf_admin_actions_course_assignments">
                <input type="button" class="button" onclick="document.location.href='/assignment';" value="Module Assignments"/>
            </li>
        </ul>
    </div>
</div>