<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->indexLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs()) ?>
<div id="sf_admin_heading">
  <h3>Personal Details</h3>
</div>
<div id="sf_admin_container">
  <div id="sf_admin_content">
    <div class="content-block">
      <h4>Click "edit" right to change your personal details: <span class="actions"><?php echo link_to(__("Edit"), "@profile_details_edit?id=" . $profile->getId(), array("id" => "edit_profile_details")) ?></span></h4>
      <div class="full-block" id="profile_details">
        <?php include_partial('details', array("profile" => $profile)) ?>
      </div>
    </div>
  </div>
</div>
<script type='text/javascript'>
  //<![DATA[
  $(document).ready(function(){
    $("#edit_profile_details").click(function(){
      openPopup($(this).attr("href"),'410px',"480px","Edit Personal Details");
      return false;
    });
  });

  function fetchProfileDetailss(){
    $("#profile_details").load("/profile/details/ajax");
  }
  //]]
</script>