<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->indexLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs()) ?>
<?php end_slot() ?>

<div id="sf_admin_heading">
    <h3>Student Peers</h3>
</div>
<div id="sf_admin_content">
    <div class="content-block">
        <div class="peer-block plain-row padding-10">        
            <div class="peer"> 
                <a class="image" href="/backend.php/profile"><img height="36px" width="36px" alt="Batanayi Matuku" src="/avatars/36.png"></a>
                <div class="name">Batanayi Matuku</div>
                <div class="type">Student</div>
            </div>
            <div class="peer"> 
                <a class="image" href="/backend.php/profile"><img height="36px" width="36px" alt="Batanayi Matuku" src="/avatars/36.png"></a>
                <div class="name">Innocent Nyama</div>
                <div class="type">Instructor</div>
            </div>
            <div class="peer"> 
                <a class="image" href="/backend.php/profile"><img height="36px" width="36px" alt="Batanayi Matuku" src="/avatars/36.png"></a>
                <div class="name">Braian Harvey</div>
                <div class="type">Instructor</div>
            </div>
            <div class="peer  last"> 
                <a class="image" href="/backend.php/profile"><img height="36px" width="36px" alt="Batanayi Matuku" src="/avatars/36.png"></a>
                <div class="name">Warrent Mahomva</div>
                <div class="type">Student</div>
            </div>
            <div class="peer"> 
                <a class="image" href="/backend.php/profile"><img height="36px" width="36px" alt="Batanayi Matuku" src="/avatars/36.png"></a>
                <div class="name">John Searle</div>
                <div class="type">Instructor</div>
            </div>
            <div class="peer"> 
                <a class="image" href="/backend.php/profile"><img height="36px" width="36px" alt="Batanayi Matuku" src="/avatars/36.png"></a>
                <div class="name">Kudakwashe Madzora</div>
                <div class="type">Student</div>
            </div>
            <div class="peer"> 
                <a class="image" href="/backend.php/profile"><img height="36px" width="36px" alt="Batanayi Matuku" src="/avatars/36.png"></a>
                <div class="name">Kudzai Gwenhamo</div>
                <div class="type">Student</div>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){        
        // load recent announcements
        fetchRecentAnnouncements();
    });

    function fetchUpcommingEvents(){
        $.get('/backend.php/course_meeting_time/meetingTimes', showUpcommingEvents);
    }
    //]]
</script>