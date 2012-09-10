<?php use_helper('I18N', 'Date') ?>
<?php include_partial('course/assets') ?>

<div class="sf_admin_heading">
    <h3><?php echo __('%%name%%', array('%%name%%' => $academic_period->getName()), 'messages') ?></h3>
</div>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_secondary', array("item_level_1" => "academics", "item_level_2" => "course", "module_name" => "course")) ?>
<?php end_slot() ?>

<div id="sf_admin_form_container">
    <div id="sf_admin_content">
        <div class="sf_admin_show" style="float:left;width:45%">
            <h2>Information <a href="/backend.php/academic_period/<?php echo $academic_period->getId() ?>/edit">Edit</a></h2>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">    
                <div>
                    <label for="course_name">Academic year</label>
                    <div class="content ">
                        <?php echo $academic_period->getAcademicYear()->getYearRange() ?>
                    </div>
                </div>
            </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">    
                <div>
                    <label for="course_name">Term name</label>
                    <div class="content ">
                        <?php echo $academic_period->getName() ?>
                    </div>
                </div>
            </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">    
                <div>
                    <label for="course_name">Start date</label>
                    <div class="content ">
                        <?php echo $academic_period->getStartDate() ?>
                    </div>
                </div>
            </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">    
                <div>
                    <label for="course_name">End date</label>
                    <div class="content ">
                        <?php echo $academic_period->getEndDate() ?>
                    </div>
                </div>
            </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">    
                <div>
                    <label for="course_name">Grades due</label>
                    <div class="content ">
                        <?php echo $academic_period->getGradesDue() ?>
                    </div>
                </div>
            </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">    
                <div>
                    <label for="course_name">Max credits</label>
                    <div class="content ">
                        <?php echo $academic_period->getMaxCredits() ?>
                    </div>
                </div>
            </div>
        </div>  
        <div id="course_extra">    
            <div class="sf_admin_show">
                <h2>Statistics <a href="/backend.php/course_meeting_time">Edit</a></h2>
                <div id="course_meeting_times">
                    <?php foreach ($course_meeting_times as $course_meeting_time): ?>
                        <div style="clear:both">
                            <div class="name"><?php echo CourseMeetingTimeTable::$days[$course_meeting_time->getDay()] ?></div>
                            <div class="value">
                                <?php echo $course_meeting_time->getFromTime() ?> - <?php echo $course_meeting_time->getToTime() ?><br />
                                <?php echo $course_meeting_time->getRoom() ?>,
                                <?php echo $course_meeting_time->getBuilding() ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>   
            <br style="clear:both"/>
        </div>	  
    </div>
</div>