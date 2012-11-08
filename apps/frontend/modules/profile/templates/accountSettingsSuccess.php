<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->accountSettingsLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->accountSettingsBreadcrumbs()) ?>
<?php end_slot() ?>

<div id="sf_admin_content">
    <div class="content-block">
        <h2>Account Settings <span class="actions"><?php echo link_to(__("Edit"), "@profile_account_settings_edit?id=" . $sf_user->getId(), array("id" => "edit_account_settings")) ?></span></h2>
        <div class="full-block no-padding" id="profile_account_settings">    
            <?php include_partial('account_settings/settings', array('profile' => $sf_user->getProfile())) ?>
        </div>
    </div>
</div>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){
        $("#edit_account_settings").click(function(){
            openPopup($(this).attr("href"), '410px', "480px", "Edit Account Settings");
            return false;
        });
    });
        
    function fetchProfileAccountSettings(){  
        $("#profile_account_settings").load("/profile_account_settings_ajax");            
    }
    //]]
</script>