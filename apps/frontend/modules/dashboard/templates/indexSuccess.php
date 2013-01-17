<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->indexLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs()) ?>
<div id="sf_admin_content" class="dashboard">
  <div class="column-one">
    <?php include_partial('personal_info/photo', array('profile' => $profile, "dimension" => 128)) ?>
    <div class="row">
      <div class="messages">        
        <div class="caption">Messages</div>
        <a href="/message/inbox">Messages</a>
      </div>
    </div>
    <div class="row">
      <div class="events">
        <div class="caption">Events</div>
        <a href="/calendar/event">Events</a>
      </div>
    </div>
    <div class="row">
      <h4>My Peers</h4>
      <div id="dashboard_peers">
        <?php include_partial('peers', array("peers" => $peers, "profile" => $profile)) ?>
      </div>
    </div>
  </div>
  <div class="column-two">
    <div class="row">
      <h2>Welcome, <?php echo $profile->getTitle() . " " . $profile->getName() ?>!</h2>
    </div>
    <div class="row">
      <h4>My Courses</h4>
      <div id="dashboard-courses">
        <?php include_partial('courses', array("courses" => $courses, "profile" => $profile)) ?>
      </div>
    </div>
    <div class="row">
      <h4>My Discussions</h4>
      <div id="dashboad_news_items">
        <?php include_partial('discussions', array("discussions" => $discussions)) ?>
      </div>
    </div>
  </div>
  <div class="column-three">
    <div class="row">
      <h4>News Updates</h4>
      <div id="dashboad_news_items">
        <?php include_partial('news_items', array("newsItems" => $newsItems)) ?>
      </div>
    </div>
    <div class="row">
      <h4>Announcements</h4>
      <div id="dashboard_announcements">
        <?php include_partial('announcements', array("announcements" => $announcements)) ?>
      </div>
    </div>
  </div>
</div>
<script type='text/javascript'>
  //<![DATA[
  $(document).ready(function(){
  });
  //]]
</script>