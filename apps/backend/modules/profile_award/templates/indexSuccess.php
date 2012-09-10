<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->awardLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->awardBreadcrumbs()) ?>
<?php end_slot() ?>

<div id="sf_admin_content">
    <div class="content-block">
        <h2>Awards <span class="actions"><?php echo link_to(__("+ Add"), "@profile_award_new", array("id" => "add_profile_award")) ?></span></h2>
        <div class="full-block" id="profile_awards_list">    
            <?php include_partial('list', array("profile" => $profile)) ?>
        </div>
    </div>
</div>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){
        $("#add_profile_award").click(function(){
            openPopup($(this).attr("href"), '460px', "480px", "Add An Award");
            return false;
        });
    });
        
    function fetchProfileAwards(){  
        $("#profile_awards_list").load("/backend.php/profile_award_ajax");            
    }
    //]]
</script>