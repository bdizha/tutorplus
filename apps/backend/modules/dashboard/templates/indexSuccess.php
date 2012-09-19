<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->dashboardLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->dashboardBreadcrumbs()) ?>
<?php end_slot() ?>

<div id="sf_admin_heading">
    <h3><?php echo __('My Dashboard', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_content">
    <div class="content-block">
        <div class="left-block">        
            <h2>Recent Activities</h2>
            <div class="half-block" id="recent_activities"> 
                <a class="image" href="/backend.php/profile"><img height="36px" width="36px" alt="Batanayi Matuku" src="/avatars/36.png"></a>
                <div class="value">TutorPlus is a 21st generation collaborative learning platform. We're constantly improving on the features of this platform and we would like to hear from your views about what to include in the next releases.</div>
                <div class="user">By <a href="/backend.php/profile">Batanayi Matuku</a>  - <span class="datetime">9 days ago</span></div>
            </div>
        </div>    
        <div class="right-block">        
            <h2>Upcoming Calendar Events</h2>
            <div class="half-block" id="upcoming_events"> 
                <a class="image" href="/backend.php/profile"><img height="36px" width="36px" alt="Batanayi Matuku" src="/avatars/36.png"></a>
                <div class="value">TutorPlus is a 21st generation collaborative learning platform. We're constantly improving on the features of this platform and we would like to hear from your views about what to include in the next releases.</div>
                <div class="user">By <a href="/backend.php/profile">Batanayi Matuku</a>  - <span class="datetime">9 days ago</span></div>
            </div>
        </div>
        <br style="clear:both"/>
    </div>
    <div class="content-block white-background">
        <h2>Recent Announcements</h2>
        <div class="full-block" id="recent_announcements"> 
            <a class="image" href="/backend.php/profile"><img height="36px" width="36px" alt="Batanayi Matuku" src="/avatars/36.png"></a>
            <div class="value">TutorPlus is a 21st generation collaborative learning platform. We're constantly improving on the features of this platform and we would like to hear from your views about what to include in the next releases.</div>
            <div class="user">By <a href="/backend.php/profile">Batanayi Matuku</a>  - <span class="datetime">9 days ago</span></div>
        </div>
    </div>
    <div class="content-block">
        <div class="left-block">
            <h2>Latest News</h2>
            <div class="half-block" id="recent_news"> 
                <a class="image" href="/backend.php/profile"><img height="36px" width="36px" alt="Batanayi Matuku" src="/avatars/36.png"></a>
                <div class="value">TutorPlus is a 21st generation collaborative learning platform. We're constantly improving on the features of this platform and we would like to hear from your views about what to include in the next releases.</div>
                <div class="user">By <a href="/backend.php/profile">Batanayi Matuku</a>  - <span class="datetime">9 days ago</span></div>
            </div>
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
</div>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){        
        // load recent announcements
        //fetchRecentAnnouncements();
        
        // load recent upcoming events
        fetchUpcommingEvents();
        
        // load recent news
        //fetchRecentNewss();
        
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