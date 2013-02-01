<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->publicInfoLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->publicInfoBreadcrumbs()) ?>
<div id="sf_admin_heading">
  <h3><?php echo $profile->getTitle() . " " . $profile->getName() ?></h3>
</div>
<div id="sf_admin_container">
  <div id="sf_admin_content">
    <div class="content-block">
      <h2>Profile info <span class="actions"> <?php if ($sf_user->isCurrent($profile->getId())): ?><span class="actions"><?php echo link_to(__("Edit"), "@profile_info_edit?id=" . $profile->getId(), array("id" => "edit_profile_info")) ?></span><?php endif; ?></h2>
      <div class="full-block">
        <div class="profile-image">
          <?php include_partial('personal_info/photo', array('profile' => $profile, "dimension" => 128)) ?>
          <?php if ($sf_user->isCurrent($profile->getId())): ?>
            <?php if ($sf_user->hasPhoto()): ?>
              <input type="button" class="button" id="upload_photo" value="Change Photo"></input>
              <input type="button" class="button" id="crop_photo" value="Crop Photo"></input>
            <?php else: ?>
              <input type="button" class="button" id="upload_photo" value="Upload Photo"></input>
            <?php endif; ?>
          <?php else: ?>
            <input type="button" class="button" id="send_email" value="Send Email"></input>
          <?php endif; ?>
        </div>
        <div class="profile-info" id="profile_info">
          <?php include_partial('profile/info', array('profile' => $profile)) ?>
        </div>
      </div>
    </div>
    <div class="content-block" id="timeline">
      <div id="discussion_post_form_container">
        <?php include_partial('discussion_post/form', array('discussion_post' => new DiscussionPost(), 'form' => $discussionPostForm)) ?>
      </div>
      <div id="discussion-comments">
        <?php foreach ($activityFeeds as $key => $activityFeed): ?>
          <?php include_partial('activity_feed/snapshot', array('activityFeed' => $activityFeed)) ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>    
</div>
<?php include_partial('discussion_comment/js') ?>
<script type='text/javascript'>
  //<![DATA[
  $(document).ready(function(){
    $("#edit_profile_info").click(function(){
      openPopup($(this).attr("href"),'410px',"600px","Edit Personal Info");
      return false;
    });
  });

  $("#upload_photo").click(function(){
    openPopup("/profile/upload/photo","600px","300px",$(this).attr("value"));
    return false;
  });

  $("#crop_photo").click(function(){
    openPopup("/profile/crop/photo","600px","600px",$(this).attr("value"));
    return false;
  });

  function fetchProfileInfos(){
    $('#profile_info').load('/profile/info/ajax');
  }
  //]]
</script>