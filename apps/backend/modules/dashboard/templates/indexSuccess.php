<?php use_helper('I18N', 'Date') ?>
<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', array("current_parent" => "dashboard", "current_child" => "my_dashboard", "current_link" => "my_dashboard")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Dashboard" => "dashboard"))) ?>
<?php end_slot() ?>

<?php include_partial('common/assets') ?>
<div id="sf_admin_heading">
    <h3><?php echo __('Outlook', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_content">
    <div class="content-block">
        <div class="left-block">        
            <h2>Recent Activities</h2>
            <div id="recent_activities">                            
            </div>
        </div>    
        <div class="right-block">        
            <h2>Upcoming Calendar Events</h2>
            <div id="upcoming_events"></div>
        </div>
        <br style="clear:both"/>
    </div>
    <div class="content-block">
        <div class="left-block">
            <h2>Latest News</h2>
            <div id="recent_newss"></div>
        </div>
        <div class="right-block">        
            <h2>My Courses</h2>
            <div id="my_courses">
                <div class="my_course">CSC - <a href="#">Human Computer Interaction</a></div>
                <div class="my_course">PHE - <a href="#">Data Communications</a></div>
                <div class="my_course">CS1 - <a href="#">Programming Concepts</a></div>
                <div class="my_course">CS2 - <a href="#">Database Concepts</a></div>
            </div>
        </div>
        <br style="clear:both"/>
    </div>
    <div class="content-block">
        <h2>Recent Announcements</h2>
        <div id="recent_announcements"></div>
    </div>
</div>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){        
        // load recent announcements
        fetchRecentAnnouncements();
        
        // load recent upcoming events
        fetchUpcommingEvents();
        
        // load recent news
        fetchRecentNewss();
        
        // load current course
        //fetchCourses();
    });

    function fetchUpcommingEvents(){
        $.get('/backend.php/course_meeting_time/meetingTimes', showUpcommingEvents);
    }

    function fetchCourses(){
        $.get('/backend.php/course_link/links', showCourses);
    }

    function fetchRecentAnnouncements(){
        $.get('/backend.php/announcement/recent', showRecentAnnouncements);
    }

    function fetchRecentNewss(){
        $.get('/backend.php/news/recent', showRecentNewss);
    }

    function showRecentAnnouncements(res){
        $('#recent_announcements').html(res);
    }

    function showRecentNewss(res){
        $('#recent_newss').html(res);
    }

    function showCourses(res){
        $('#course_meeting_times').html(res);
    }

    function showUpcommingEvents(res){
        $('#upcoming_events').html(res);
    }
    //]]
</script>