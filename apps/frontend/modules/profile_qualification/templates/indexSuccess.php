<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->qualificationLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->qualificationBreadcrumbs()) ?>
<div id="sf_admin_heading">
  <h3><?php echo $profile->getTitle() . " " . $profile->getName() ?>'s qualifications</h3>
</div>
<div id="sf_admin_container">
  <div id="sf_admin_content">
    <div class="content-block">
      <h2>Qualifications <?php if ($sf_user->isCurrent($profile->getId())): ?><span class="actions"><?php echo link_to(__("+ Add"), "@profile_qualification_new", array("id" => "add_profile_qualification")) ?></span><?php endif; ?></h2>
      <div class="full-block" id="profile_qualifications">    
        <?php include_partial('list', array("profile" => $profile, "helper" => $helper)) ?>
      </div>
    </div>
  </div>
</div>
<script type='text/javascript'>
  //<![DATA[
  $(document).ready(function(){
    $("#add_profile_qualification").click(function(){
      openPopup($(this).attr("href"),'410px',"480px","Add A Qualification");
      return false;
    });
  });

  function fetchProfileQualifications(){
    $("#profile_qualifications").load("/profile/qualification/ajax");
  }
  //]]
</script>