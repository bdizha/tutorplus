<?php use_helper('I18N', 'Date') ?>
<?php include_partial('common/assets') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_secondary', array("item_level_1" => "academics2", "item_level_2" => "course_info", "current_route" => "attendance")) ?>
<?php end_slot() ?>
<div class="sf_admin_heading">
    <h3><?php echo __('%%code%% - %%name%%', array('%%code%%' => $course->getCode(), '%%name%%' => $course->getName()), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">
    <div id="sf_admin_content">
        <div style="float:left;width:65%">
            <div class="sf_admin_show">
                <h2>Take attendance for "<?php echo $course->getCode() ?>"</h2>
                <div class="sf_admin_list">
                    <table cellspacing="1">
                        <thead>
                            <tr>
                                <th class="sf_admin_text sf_admin_list_th_first_name">Student</th>
                                <th class="sf_admin_text sf_admin_list_th_number">Attendance</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th colspan="2">2 results</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr class="sf_admin_row even">
                                <td class="sf_admin_text sf_admin_list_td_first_name"><a href="#">Batanayi Matuku</a></td>
                                <td class="sf_admin_text sf_admin_list_td_first_name"><select><option>--</option></select></td>
                            </tr>
                            <tr class="sf_admin_row odd">
                                <td class="sf_admin_text sf_admin_list_td_first_name"><a href="#">Tendai Ndlovu</a></td>
                                <td class="sf_admin_text sf_admin_list_td_first_name"><select><option>--</option></select></td>
                            </tr>
                            <tr class="sf_admin_row even">
                                <td class="sf_admin_text sf_admin_list_td_first_name"><a href="#">Tonderai Mwenje</a></td>
                                <td class="sf_admin_text sf_admin_list_td_first_name"><select><option>--</option></select></td>
                            </tr>
                            <tr class="sf_admin_row odd">
                                <td class="sf_admin_text sf_admin_list_td_first_name"><a href="#">Fungai Dizha</a></td>
                                <td class="sf_admin_text sf_admin_list_td_first_name"><select><option>--</option></select></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <ul class="sf_admin_actions" style="clear:both">
                <li class="sf_admin_action_new">
                    <input type="button" onclick="document.location.href='/backend.php/assignment';" value="&larr; Course Attendance">
                    <input type="button" onclick="document.location.href='/backend.php/attendance';" value="&larr; Previous Attendance">
                    <input type="button" onclick="document.location.href='/backend.php/attendance';" value="Next Attendance &rarr;">
                </li>
            </ul>	  
        </div>
        <div style="float:left;width:35%">
            <div id="course_extra">   
                <div class="sf_admin_show">
                    <h2>Attendance Info</h2>
                    <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">  
                        <div>
                            <label for="course_name">Start</label>
                            <div class="content ">
				      	05/06/2011 9:00am
                            </div>
                        </div>
                    </div>
                    <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">  
                        <div>
                            <label for="course_name">End</label>
                            <div class="content ">
				      	05/06/2011 11:00am
                            </div>
                        </div>
                    </div>
                    <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">  
                        <div>
                            <label for="course_name">Room</label>
                            <div class="content ">
				      	SD90 in the Chemistry building
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="sf_admin_show">
                    <h2>Statistics</h2>
                    <div class="sf_admin_list">
                        <table cellspacing="1">
                            <thead>
                                <tr>
                                    <th class="sf_admin_text sf_admin_list_th_first_name">Attendance</th>
                                    <th class="sf_admin_text sf_admin_list_th_first_name"># Students</th>
                                    <th class="sf_admin_text sf_admin_list_th_number">% of Class</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="sf_admin_row even">
                                    <td class="sf_admin_text sf_admin_list_td_first_name">Present</td>
                                    <td class="sf_admin_text sf_admin_list_td_first_name">23</td>
                                    <td class="sf_admin_text sf_admin_list_td_first_name">56%</td>
                                </tr>
                                <tr class="sf_admin_row even">
                                    <td class="sf_admin_text sf_admin_list_td_first_name">Absent</td>
                                    <td class="sf_admin_text sf_admin_list_td_first_name">6</td>
                                    <td class="sf_admin_text sf_admin_list_td_first_name">21%</td>
                                </tr>
                                <tr class="sf_admin_row even">
                                    <td class="sf_admin_text sf_admin_list_td_first_name">Tardy</td>
                                    <td class="sf_admin_text sf_admin_list_td_first_name">3</td>
                                    <td class="sf_admin_text sf_admin_list_td_first_name">6%</td>
                                </tr>
                                <tr class="sf_admin_row even">
                                    <td class="sf_admin_text sf_admin_list_td_first_name">Excused</td>
                                    <td class="sf_admin_text sf_admin_list_td_first_name">3</td>
                                    <td class="sf_admin_text sf_admin_list_td_first_name">27%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br style="clear:both"/>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
    $(document).ready(function(){
        $("#edit_course").click(function(){
            $("#sf_admin_container").load($(this).attr("popup_url"));
        });
	
        //fetchCourseMeetingTimes();
        //fetchCourseLinks();
    });

    function openDialogBox(title, popup_url){
        openDialog(title);
        $("#popup").load(popup_url);
    }

    function fetchCourseMeetingTimes(){
        $.get('/backend.php/course_meeting_time/meetingTimes', showCourseMeetingTimes);
    }

    function fetchCourseLinks(){
        $.get('/backend.php/course_link/links', showCourseLinks);
    }

    function showCourseMeetingTimes(res){
        $('#course_meeting_times').html(res);
    }

    function showCourseLinks(res){
        $('#course_links').html(res);
    }
</script>
<div id="popup">&nbsp;</div>