<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->myScheduleLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->myScheduleBreadcrumbs()) ?>
<?php end_slot() ?>

<div id="sf_admin_heading">
    <h3><?php echo __('My Schedule', array(), 'messages') ?></h3>
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