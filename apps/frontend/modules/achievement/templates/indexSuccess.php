<?php use_helper('I18N', 'Date') ?>
<?php include_partial('common/assets') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_tertiary', array("item_level_1" => "profile", "item_level_2" => "my_profile", "current_route" => "achievement", "include_bottom_block" => true, "bottom_block" => "profile/correspondents")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Profile" => "profile", "My Achievements" => "achievement"))) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3><?php echo __('My Achievements', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_content">
    <div class="content-block">
        <?php include_component("profile", "info", array("profile" => $profile)) ?>
    </div>
    <div class="content-block">
        <div id="sf_admin_form_container">
            <div id="sf_admin_content">
                <h2>My Qualifications
                    <span class="actions">
                        <a href="/profile_qualification/new" id="add_profile_qualications">Add</a>
                    </span>
                </h2>
                <div id="qualifications_list"></div>
                <h2>My Awards
                    <span class="actions">
                        <a href="/profile_award/new" id="add_profile_awards">Add</a>
                    </span>
                </h2>
                <div id="awards_list"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){        
        // load the qualification list
        fetchProfileQualifications();
              
        // load the awards list
        fetchProfileAwards();
        
        $("#add_profile_qualications").click(function(){
            openPopup($(this).attr("href"), '460px', "480px", "Add A Qualification");
            return false;
        });
    
        $("#add_profile_awards").click(function(){
            openPopup($(this).attr("href"), '460px', "480px", "Add An Award");
            return false;
        });
    });    
        
    function fetchProfileQualifications(){  
        $("#qualifications_list").load("/profile_qualifications");            
    }
        
    function fetchProfileAwards(){  
        $("#awards_list").load("/profile_awards");            
    }
</script>