<?php use_helper('I18N', 'Date') ?>
<?php include_partial('common/assets') ?>

<?php include_partial('calendar/flashes') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_tertiary', array("item_level_1" => "dashboard", "item_level_2" => "home", "current_route" => "my_calendar", "include_bottom_menu" => true, "module" => "calendar", "partial" => "nav_vertical_bottom")) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3><?php echo __('My Calendar', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_content">    
    <div id="calendar"></div>
</div>
<script type='text/javascript'>
    $(document).ready(function(){			
        var calendar = $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            selectable: true,
            selectHelper: true,
            select: function(start, end, allDay) {
                var title = prompt('Event Title:');
                if (title) {
                    calendar.fullCalendar('renderEvent',
                    {
                        title: title,
                        start: start,
                        end: end,
                        allDay: allDay
                    },
                    true // make the event "stick"
                );
                }
                calendar.fullCalendar('unselect');
            },
            editable: true,
            events: '/backend.php/events'
        });		
    });
</script>
<style type="text/css">
    #calendar{
        margin: 0 auto;
        width: 100%;
    }
</style>