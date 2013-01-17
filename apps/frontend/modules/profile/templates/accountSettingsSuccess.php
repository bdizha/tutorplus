<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->accountSettingsLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->accountSettingsBreadcrumbs()) ?>
<div id="sf_admin_heading">
  <h3>Account Settings</h3>
</div>
<div id="sf_admin_container">
  <div id="sf_admin_content">
    <div class="content-block">
      <h4>Account Settings <span class="actions"><?php echo link_to(__("Edit"), "@profile_account_settings_edit?id=" . $sf_user->getId(), array("id" => "edit_account_settings")) ?></span></h4>
      <div class="full-block" id="account_settings">
        <div class="account-settings-block">
          <div class="profile-row">
            <div class="row-label">
              Title:
            </div>
            <div class="row-value">
              <?php echo $profile->getTitle() ?>
            </div>                        
          </div>     
          <div class="profile-row">
            <div class="row-label">
              First name:
            </div>
            <div class="row-value">
              <?php echo $profile->getFirstName() ?>
            </div>                        
          </div>
          <div class="profile-row">
            <div class="row-label">
              Last name:
            </div>
            <div class="row-value">
              <?php echo $profile->getLastName() ?>
            </div>                        
          </div>
          <div class="profile-row">
            <div class="row-label">
              Email:
            </div>
            <div class="row-value">
              <?php echo $profile->getEmail() ?>
            </div>                        
          </div>
        </div>
        <div class="account-settings-block">
          <div class="profile-row">
            <div class="row-label">
              Birth date:
            </div>
            <div class="row-value">
              <?php echo $profile->getBirthDate("d/M/Y") ?>
            </div>      
            <div class="profile-row">
              <div class="row-label">
                Gender:
              </div>
              <div class="row-value">
                <?php echo $profile->getGender() ?>
              </div>                        
            </div>
            <div class="profile-row">
              <div class="row-label">
                Email:
              </div>
              <div class="row-value">
                <?php echo $profile->getEmail() ?>
              </div>                        
            </div>
            <div class="profile-row">
              <div class="row-label">
                Password:
              </div>
              <div class="row-value">********</div>                        
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type='text/javascript'>
  //<![DATA[
  $(document).ready(function(){
    $("#edit_account_settings").click(function(){
      openPopup($(this).attr("href"),'410px',"480px","Edit Account Settings");
      return false;
    });
  });

  function fetchProfileAccountSettings(){
    $("#profile_account_settings").load("/profile_account_settings_ajax");
  }
  //]]
</script>