<?php use_helper('I18N', 'Date') ?>
<?php include_partial('common/assets') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_tertiary', array("item_level_1" => "profile", "item_level_2" => "my_profile", "current_route" => "studies", "include_bottom_block" => true, "bottom_block" => "profile/correspondents")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Profile" => "profile", "My Studies" => "studies"))) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3><?php echo __('My Studies', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_content">
    <div class="content-block">
        <?php include_component("profile", "info") ?>
    </div>
    <div class="content-block">
        <h2>Courses</h2>
        <div id="courses_list">
            <ul>
                <li>
                    <div class="course-image">
                        <img alt="Philosophy of English" src="/images/icons/14x14/my_courses.png">
                    </div>
                    <div class="course-name">
                        Philosophy of English            
                    </div>
                </li>
                <li>
                    <div class="course-image">
                        <img alt="Philosophy of English" src="/images/icons/14x14/my_courses.png">
                    </div>
                    <div class="course-name">
                        Philosophy of English            
                    </div>
                </li> 
            </ul>
            <div class="clear"></div>        
        </div>
        <h2>Programmes</h2>
        <div id="courses_list">
            <ul>
                <li>
                    <div class="course-image">
                        <img alt="Philosophy of English" src="/images/icons/14x14/my_courses.png">
                    </div>
                    <div class="course-name">
                        Philosophy of English            
                    </div>
                </li>
                <li>
                    <div class="course-image">
                        <img alt="Philosophy of English" src="/images/icons/14x14/my_courses.png">
                    </div>
                    <div class="course-name">
                        Philosophy of English            
                    </div>
                </li> 
            </ul>
            <div class="clear"></div>        
        </div>
    </div>    
</div>
<script type="text/javascript">
    $(document).ready(function(){        
        $("#account-settings").load("/student_account_settings_details");
    });
</script>