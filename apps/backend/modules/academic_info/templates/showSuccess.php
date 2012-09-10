<?php use_helper('I18N', 'Date') ?>

<div id="sf_admin_content">
    <div id="academic_c_content">
        <div class="sf_admin_show">
            <h2>Information <a href="#" onclick="openDialogBox('Edit Academic Period', '/backend.php/academic_period/<?php echo $academic_period->getId() ?>/edit');">Edit</a></h2>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">    
                <div>
                    <label>Academic year</label>
                    <div class="content ">
                        <?php echo $academic_period->getAcademicYear()->getYearRange() ?>
                    </div>
                </div>
            </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">    
                <div>
                    <label>Term name</label>
                    <div class="content ">
                        <?php echo $academic_period->getName() ?>
                    </div>
                </div>
            </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">    
                <div>
                    <label>Start date</label>
                    <div class="content ">
                        <?php echo $academic_period->getStartDate() ?>
                    </div>
                </div>
            </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">    
                <div>
                    <label>End date</label>
                    <div class="content ">
                        <?php echo $academic_period->getEndDate() ?>
                    </div>
                </div>
            </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">    
                <div>
                    <label>Grades due</label>
                    <div class="content ">
                        <?php echo $academic_period->getGradesDue() ?>
                    </div>
                </div>
            </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">    
                <div>
                    <label>Max credits</label>
                    <div class="content ">
                        <?php echo $academic_period->getMaxCredits() ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="sf_admin_show">
            <h2>Registration Details <a href="#">Edit</a></h2>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">    
                 <div class="content">
                    Registration will commence on 20/08/2011 for a period of a week.
                </div>
            </div>
        </div>
    </div>
    <div id="academic_r_content">
        <div class="sf_admin_show">
            <h2>Statistics <a href="/backend.php/course_meeting_time">Edit</a></h2>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">    
                <div>
                    <label>Enrolled</label>
                    <div class="content ">
                        <?php echo 564 ?>
                    </div>
                </div>
            </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">    
                <div>
                    <label>Withdrawn</label>
                    <div class="content ">
                        <?php echo 45 ?>
                    </div>
                </div>
            </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">    
                <div>
                    <label>Credits Attempted</label>
                    <div class="content ">
                        <?php echo 415.00 ?>
                    </div>
                </div>
            </div>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_name">    
                <div>
                    <label>Courses</label>
                    <div class="content ">
                        <?php echo 78 ?>
                    </div>
                </div>
            </div>
        </div>		   
    </div>
</div>   
<br style="clear:both"/>
<div id="popup">&nbsp;</div>
<script type="text/javascript">
    function openDialogBox(title, popup_url){
        openDialog(title);
        $(".ui-dialog-content").load(popup_url);
    }
	
    function openDialog(title){		
        $("#popup").dialog({
            modal:true,
            title: title,
            autoOpen:false,
            buttons:{"Cancel":function(){
                    $(this).dialog('close');
                },
                "Save":function(){					
                    $("#form").ajaxSubmit(function(data){
                        $(".ui-dialog-content").html(data);
                    });
                }
            },
            position:'center',
            minHeight:200,
            width:<?php echo sfConfig::get("app_popup_course_meeting_time_width") ?>,
            resizable:true,
            draggable:true
        });
		
        $("#popup").html('<div style="margin-right:auto; margin-left:auto; width:32px; height:32px"><img alt="Loading..." src="/images/ajax-loader.gif"/></div>');
        $("#popup").dialog("open");
    }
</script>