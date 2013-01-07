<?php use_helper('I18N', 'Date') ?>
<div class="profile-row">
    <div class="profile-column">    
        <label>Username:</label>
        <div class="content"><?php echo $profile->getProfile()->getUsername() ?></div>
    </div>
     <div class="profile-column">    
        <label>Password:</label>
        <div class="content">********</div>
    </div>
</div>
<div class="profile-row">
    <div class="profile-column">    
        <label>Email address:</label>
        <div class="content">
            <?php echo $profile->getProfile()->getEmailAddress() ?>
        </div>
    </div>   
    <div class="profile-column">    
        <label>Is active?</label>
        <div class="content">
            <?php echo $profile->getIsActive() ? "Yes" : "No"; ?>
        </div>
    </div>
</div>
<div class="clear"></div>
<script type="text/javascript">
    $(document).ready(function(){ 
        $("#edit_account_settings").click(function(){
            openPopup($(this).attr("href"), '460px', "480px", "Edit Account Settings");
            return false;
        });
    });
</script>