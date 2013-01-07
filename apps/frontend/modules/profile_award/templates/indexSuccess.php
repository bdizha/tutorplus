<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->awardLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->awardBreadcrumbs()) ?>
<?php end_slot() ?>

<div id="sf_admin_content">
    <div class="content-block">
        <h2>Awards <?php if($sf_user->isCurrent($profile->getProfile()->getId())): ?><span class="actions"><?php echo link_to(__("+ Add"), "@profile_award_new", array("id" => "add_profile_award")) ?></span><?php endif; ?></h2>
        <div class="full-block" id="profile_awards_list">    
            <?php include_partial('list', array("profile" => $profile, "helper" => $helper)) ?>
        </div>
    </div>
</div>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){
        $("#add_profile_award").click(function(){
            openPopup($(this).attr("href"), '410px', "480px", "Add An Award");
            return false;
        });
    });
        
    function fetchProfileAwards(){  
        $("#profile_awards_list").load("/profile/award/ajax");            
    }
    //]]
</script>