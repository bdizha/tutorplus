<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->qualificationLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->qualificationBreadcrumbs()) ?>
<?php end_slot() ?>

<div id="sf_admin_content">
    <div class="content-block">
        <h2>Qualifications <?php if($sf_user->isCurrent($profile->getUser()->getId())): ?><span class="actions"><?php echo link_to(__("+ Add"), "@profile_qualification_new", array("id" => "add_profile_qualification")) ?></span><?php endif; ?></h2>
        <div class="full-block" id="profile_qualifications_list">    
            <?php include_partial('list', array("profile" => $profile)) ?>
        </div>
    </div>
</div>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){
        $("#add_profile_qualification").click(function(){
            openPopup($(this).attr("href"), '410px', "480px", "Add A Qualification");
            return false;
        });
    });
        
    function fetchProfileQualifications(){  
        $("#profile_qualifications_list").load("/profile_qualification_ajax");            
    }
    //]]
</script>