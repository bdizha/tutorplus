<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getLinks()) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->getBreadcrumbs()) ?>
<div id="sf_admin_heading">
  <h3><?php echo $profile->getTitle() . " " . $profile->getName() ?>'s awards</h3>
</div>
<div id="sf_admin_container">
  <div id="sf_admin_content">
    <div class="content-block">
      <h2>Awards <?php if ($sf_user->isCurrent($profile->getId())): ?><span class="actions"><?php echo link_to(__("+ Add"), "@profile_award_new", array("id" => "add_profile_award")) ?></span><?php endif; ?></h2>
      <div id="profile_awards_list">    
        <?php include_partial('list', array("profile" => $profile, "helper" => $helper)) ?>
      </div>
    </div>
  </div>
</div>
<script type='text/javascript'>
  //<![DATA[
  $(document).ready(function(){
    $("#add_profile_award").click(function(){
      openPopup($(this).attr("href"),'410px',"480px","Add An Award");
      return false;
    });
  });

  function fetchProfileAwards(){
    $("#profile_awards_list").load("/profile/award/ajax");
  }
  //]]
</script>