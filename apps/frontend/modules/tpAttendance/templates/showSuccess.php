<?php use_helper('I18N', 'Date') ?>
<?php include_partial('attendance/assets') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('tpCommon/nav_vertical_secondary', array("item_level_1" => "academics2", "item_level_2" => "course_home", "current_route" => "attendance")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('tpCommon/breadcrumbs', array('breadcrumbs' => array("Academics" => "academics", "Courses" => "course", __('%%code%% - %%name%%', array('%%code%%' => $attendance->getCourse()->getCode(), '%%name%%' => $attendance->getCourse()->getName()), 'messages') => "course/" . $attendance->getCourse()->getId(), "Attendance" => "attendance", "Student Attendance" => "/attendance/" . $attendance->getId()))) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3><?php echo __('Take Attendance for %%code%% - %%name%%', array('%%code%%' => $attendance->getCourse()->getCode(), '%%name%%' => $attendance->getCourse()->getName()), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">
    <div class="content-block">
        <div class="left-block">
            <div id="student_attendance" class="sf_admin_show">
                <?php echo form_tag_for($form, '@attendance', array('id' => 'form')) ?>
                <?php echo $form->renderHiddenFields(true) ?>            
                <div class="sf_admin_list">
                    <table cellspacing="1">
                        <thead>
                            <tr>
                                <th class="sf_admin_text">Student</th>
                                <th class="sf_admin_text">Attendance</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th colspan="2">2 results</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $i = 0; ?>
                            <?php foreach ($attendance->getCourse()->getStudents() as $student_attendance): ?>
                                <tr class="sf_admin_row even">
                                    <td class="sf_admin_text"><a href="#"><?php echo $student_attendance ?></a></td>
                                    <td class="sf_admin_text">
                                        <?php echo $form["attendances"][$i]["status"] ?>
                                    </td>
                                </tr>
                                <?php $i++ ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <ul class="sf_admin_actions" style="clear:both">
                    <li class="sf_admin_action_new">
                        <input type="button" onclick="document.location.href='/attendance';" value="< Course Attendance">
                    </li>
                    <li class="sf_admin_action_new">
                        <input type="button" value="Save Attendance" class="save"/>
                    </li>
                    <li class="sf_admin_action_new">
                        <input type="button" onclick="document.location.href='/course/<?php echo $attendance->getCourse()->getId() ?>'" value="< My Course">
                    </li>
                </ul>
                </form>
            </div>
        </div>
        <div class="right-block">
            <h2>Attendance Info</h2>
            <div class="content-row">
                <div class="course-meeting-time">  
                    <div class="name">Date</div>
                    <div class="value">
                        <?php echo $attendance->getDateTimeObject("date")->format("l, d M Y") ?>
                    </div>
                    <div class="clear"></div>
                </div>                
            </div>
            <div class="content-row">
                <div class="course-meeting-time">  
                    <div class="name">Start Time</div>
                    <div class="value">
                        <?php echo $attendance->getCourseMeetingTime()->getFromTime() ?>
                    </div>
                    <div class="clear"></div>
                </div>                
            </div>
            <div class="content-row">
                <div class="course-meeting-time">  
                    <div class="name">End Time</div>
                    <div class="value">
                        <?php echo $attendance->getCourseMeetingTime()->getToTime() ?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="content-row">
                <div class="course-meeting-time">  
                    <div class="name">Room</div>
                    <div class="value">
                        <?php echo $attendance->getCourseMeetingTime()->getRoom() ?> in the <?php echo $attendance->getCourseMeetingTime()->getBuilding() ?> building
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="content-row">
                <h2>Attendance Summary</h2>
                <div class="sf_admin_list">
                    <table cellspacing="1">
                        <thead>
                            <tr>
                                <th class="sf_admin_text">Attendance</th>
                                <th class="sf_admin_text"># Students</th>
                                <th class="sf_admin_text">% of Class</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($attendance->getAttendanceSummary() as $attendance_summary): ?>
                                <tr class="sf_admin_row even">
                                    <td class="sf_admin_text "><?php echo $attendance_summary['status'] ?></td>
                                    <td class="sf_admin_text "><?php echo $attendance_summary['total'] ?></td>
                                    <td class="sf_admin_text "><?php echo $attendance_summary['percentage'] ?></td>
                                </tr>
                            <? endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        
        // resize Widths
        resizeWidths();
        
        $(".save").click(function(){
            $("#form").ajaxSubmit(function(data){
                $("#sf_admin_form_container").html(data);
            });
        });
    });
</script>