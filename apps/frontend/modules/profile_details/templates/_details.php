<div class="account-settings-block">
  <div class="profile-row">
    <div class="row-label">First name:</div>
    <div class="row-value"><?php echo $profile->getFirstName() ?></div>                        
  </div>
  <div class="profile-row">
    <div class="row-label">Last name:</div>
    <div class="row-value"><?php echo $profile->getLastName() ?></div>                        
  </div> 
  <div class="profile-row">
    <div class="row-label">Gender:</div>
    <div class="row-value"><?php echo $profile->getGender() ?></div>                        
  </div>
</div>
<div class="account-settings-block">
  <div class="profile-row">
    <div class="row-label">Middle name:</div>
    <div class="row-value"><?php echo $profile->getMiddleName() ?></div>                        
  </div>
  <div class="profile-row">
    <div class="row-label">Title:</div>
    <div class="row-value"><?php echo $profile->getTitle() ?></div>                        
  </div>
  <div class="profile-row">
    <div class="row-label">Birth date:</div>
    <div class="row-value"><?php echo $profile->getBirthDate("d/M/Y") ?></div>
  </div>
</div>