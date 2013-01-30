<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->indexLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs()) ?>
<div id="sf_admin_content" class="dashboard">
  <div class="column-one">
    <?php include_partial('personal_info/photo', array('profile' => $profile, "dimension" => 128)) ?>
    <div class="row">
      <?php echo link_to('New Messages', 'message_inbox') ?> <span class="list-count"><?php echo $totalInboxCount ?></span>
    </div>
    <div class="row">
     <?php echo link_to('Events', 'calendar_event') ?> <span class="list-count"><?php echo $totalInboxCount ?></span>
    </div>
    <div class="row">
      <div class="underlined"><h5>You may know</h5></div>
      <div id="dashboard_suggested_peers" class="dashboard_peers">
        <?php include_partial('suggestions', array("peers" => $suggestedPeers, "profile" => $profile)) ?>
      </div>
    </div>
    <div class="row">
      <div class="underlined"><h5>My Peers <span class="list-count"><?php echo $peers->count() ?></span></h5></div>
      <div id="dashboard_my_peers" class="dashboard_peers">
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
      <h4>My Groups</h4>
      <div id="dashboad_news_items">
        <?php include_partial('discussion_groups', array("discussionGroups" => $discussionGroups)) ?>
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