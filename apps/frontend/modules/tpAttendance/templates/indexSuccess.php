<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_secondary', array("item_level_1" => "dashboard_course", "item_level_2" => "course_home", "Course Home", "current_route" => "attendance")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Dashboard" => "dashboard", "My Courses" => "my_courses", "Course ~ "  . $course->getCode() => "course/" . $course->getId(), "Attendance" => "attendance"))) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3><?php echo __('Attendance', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_content">
    <div id="attendance_calendar"></div>
</div>
<script type='text/javascript'>
    $(document).ready(function() {	
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
		
        var calendar = $('#attendance_calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: ''
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
            events: [
<?php foreach ($attendances as $attendance): ?>
                    {
                        title: '<div class="bottom_recorded"><span><?php echo $attendance->getCourseMeetingTime()->getFromTime() ?> - <?php echo $attendance->getCourseMeetingTime()->getToTime() ?><br /><?php echo $attendance->getSummaryAttendance() ?></span></div>',
                        start: new Date("<?php echo $attendance->getDateTimeObject('date')->format('m/d/Y') ?>"),
                        url: '/attendance/<?php echo $attendance->get('id') ?>'
                    },
<?php endforeach; ?>
            ]
        });		
    });
</script>
<style type="text/css">
    #attendance_calendar{
        margin: 0 auto;
        width: 100%;
    }
</style>