<div id="nav-vertical-bottom">
    <div id="calendar_heading"><h2>Calendars <a href="/backend.php/calendar">Edit</a></h2></div>
    <div id="calendars">
        <form action="/backend.php/events" method="post" id="calendar_form">
            <ul class="checkbox_list">
                <?php $calendars = CalendarTable::getInstance()->retrieveByUserIdAndVisibility($sf_user->getId()); ?>
                <?php foreach ($calendars as $calendar): ?>
                    <li>
                        <div class="calendar_name" style="background-color: <?php echo $calendar["color"] ?>;">
                            <div id="calendar_color_<?php echo $calendar["id"] ?>_id" class="calendar_color <?php echo count($sf_user->getMyAttribute('calendar_ids', array())) > 0 ? (in_array($calendar["id"], $sf_user->getMyAttribute('calendar_ids', array()))) ? "selected_calendar" : "" : "" ?>">&nbsp;</div>
                            <input type="hidden" id="calendar_<?php echo $calendar["id"] ?>_id" value="<?php echo count($sf_user->getMyAttribute('calendar_ids', array())) > 0 ? (in_array($calendar["id"], $sf_user->getMyAttribute('calendar_ids', array()))) ? $calendar["id"] : "" : "" ?>" name="calendar[id][]"></input>
                        </div>
                        <label class="calendar_label" for="calendar_color_<?php echo $calendar["id"] ?>_id">
                            <?php echo $calendar["name"] ?>
                        </label>
                    </li>
                <?php endforeach; ?>
            </ul>
        </form>
    </div>	
    <div id="calendar_date">
        <input type="hidden" value="put" name="date_selector" id="date_select">
    </div>			
    <script type="text/javascript">
        $(document).ready(function(){                
            $("#calendar_date").datepicker();            
            $(".calendar_color").click(function(){                
                var id_parts = $(this).attr("id").split("_");
                
                if( $(this).hasClass("selected_calendar"))
                {
                    $(this).removeClass("selected_calendar");                
                    if(id_parts.length == 4){                
                        $("#calendar_" + id_parts[2] + "_id").val("");                    
                    }
                }
                else
                {
                    $(this).addClass("selected_calendar");                
                    if(id_parts.length == 4){                
                        $("#calendar_" + id_parts[2] + "_id").val(id_parts[2]);                    
                    }
                }
                
                $("#calendar_form").ajaxSubmit(function(data){
                    repopulateCalendarEvents(data);
                });
            });
            
            $(".calendar_label").click(function(){
                var id_parts = $(this).attr("for").split("_");
                
                if($("#" + $(this).attr("for")).hasClass("selected_calendar"))
                {               
                    if(id_parts.length == 4){                
                        $("#calendar_" + id_parts[2] + "_id").val("");                    
                    }
                    $("#" + $(this).attr("for")).removeClass("selected_calendar");
                }
                else
                {
                    $("#" + $(this).attr("for")).addClass("selected_calendar");                
                    if(id_parts.length == 4){                
                        $("#calendar_" + id_parts[2] + "_id").val(id_parts[2]);                    
                    }
                }
                
                $("#calendar_form").ajaxSubmit(function(data){
                    repopulateCalendarEvents(data);
                });
            });
        });
        
        function repopulateCalendarEvents(data)
        {			
            $('#calendar').fullCalendar("refetchEvents");
        }
    </script>
</div>