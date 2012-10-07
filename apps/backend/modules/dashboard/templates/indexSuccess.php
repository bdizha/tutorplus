<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->dashboardLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array()) ?>
<?php end_slot() ?>

<div id="sf_admin_content">
    <div id="dashboard_container">
        <div class="content-block dashboard-block left">
            <h2>Notifications <a href="/backend.php/news" class="view-more"></a></h2>
            <div id="notifications" class="dashboard-row">
                <?php include_partial('activity_feed/list', array("activityFeeds" => $notifications)) ?>
            </div>
        </div>
        <div class="content-block dashboard-block">        
            <h2>My Peers <span class="list-count"><?php echo count($peers) ?></span> <a href="/backend.php/news" class="view-more"></a></h2>
            <div id="my_peers" class="dashboard-row">
                <?php include_partial('peers', array('myPeers' => $peers)) ?>
                <?php include_partial('peers', array('myPeers' => $peers)) ?>
                <?php include_partial('peers', array('myPeers' => $peers)) ?>
                <?php include_partial('peers', array('myPeers' => $peers)) ?>
                <?php include_partial('peers', array('myPeers' => $peers)) ?>
            </div>
        </div> 
        <div class="content-block dashboard-block left">
            <h2>My Messages <a href="/backend.php/news" class="view-more"></a></h2>
            <div id="my_messages" class="dashboard-row"></div>
        </div>
        <div class="content-block dashboard-block"> 
            <h2>Events <a href="/backend.php/news" class="view-more"></a></h2>
            <div id="events" class="dashboard-row"></div>
        </div>
        <div class="content-block dashboard-block left">
            <h2>My Courses <a href="/backend.php/news" class="view-more"></a></h2>
            <div id="my_courses" class="dashboard-row">
                <?php include_partial('courses', array('myCourses' => $courses)) ?>
            </div>
        </div>
        <div class="content-block dashboard-block">
            <h2>My Discussions <a href="/backend.php/news" class="view-more"></a></h2>
            <div id="my_discussions" class="dashboard-row">
                <?php include_partial('discussions', array('myDiscussions' => $discussions)) ?>
            </div>
        </div>
        <div class="content-block dashboard-block left">
            <h2>Announcements <a href="/backend.php/news" class="view-more"></a></h2>
            <div id="announcements" class="dashboard-row">
                <?php include_partial('announcements', array('announcements' => $announcements)) ?>
            </div>
        </div>
        <div class="content-block dashboard-block">
            <h2>News <a href="/backend.php/news" class="view-more"></a></h2>
            <div id="news_items" class="dashboard-row">
                <?php include_partial('news_items', array('newsItems' => $newsItems)) ?>
            </div>
        </div>            
    </div>   
</div>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){     
        $('#left-column').css("display", "none");
        $('#middle-column').css("margin-left", "0");
        $('#middle-column, #sf_admin_content').css("width", "940px");
    });
    //]]
</script>