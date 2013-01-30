<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->indexLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs()) ?>
<div id="sf_admin_heading">
  <h3>Access Settings</h3>
</div>
<div id="sf_admin_container">
  <div id="sf_admin_content">
    <div class="content-block">
      <h4>Click "edit" right to change your access settings: <span class="actions"><?php echo link_to(__("Edit"), "@profile_credentials_edit?id=" . $profile->getId(), array("id" => "edit_profile_credentials")) ?></span></h4>
      <div class="full-block" id="profile_credentials">
        <?php include_partial('credentials', array("profile" => $profile)) ?>        
      </div>
    </div>
  </div>
</div>
<script type='text/javascript'>
  //<![DATA[
  $(document).ready(function(){
    $("#edit_profile_credentials").click(function(){
      openPopup($(this).attr("href"),'410px',"480px","Edit Access Settings");
      return false;
    });
  });

  function fetchProfileCredentialss(){
    $("#profile_credentials").load("/profile/credentials/ajax");
  }
  //]]
</script>