<?php use_helper('I18N', 'Date', 'gfMisc') ?>
<?php include_partial('common/assets') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical_tertiary', array("item_level_1" => "profile", "item_level_2" => "my_profile", "current_route" => "correspondent", "include_bottom_block" => true, "bottom_block" => "profile/correspondents")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("Profile" => "profile", "Correspondents" => "correspondent", "Fox Matuku" => "correspondent"))) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3><?php echo __('Correspondents', array(), 'messages') ?></h3>
</div>
<div class="content-block">
    <?php include_component("profile", "info") ?>
</div>
<div class="content-block">
    <div id="sf_admin_form_container">
        <div class="content-block">
            <div class="correspond-left-block" style="width: 535px;">
                <div id="heading-tabs">
                    <ul>
                        <li class="first current" tab_content_id="profile_timeline" id="tab_wall">
                            <h4>Wall</h4>
                        </li>
                        <li id="tab_info" tab_content_id="profile_info">
                            <h4>Info</h4>
                        </li>
                        <li id="tab_info" tab_content_id="profile_current_studies">
                            <h4>Studies</h4>
                        </li>
                        <li id="tab_info" tab_content_id="profile_achievements">
                            <h4>Achievements</h4>
                        </li>
                    </ul>    
                </div>
                <div class="profile_details" id="profile_timeline" style="display:block"></div>
                <div class="profile_details" id="profile_info" style="display:none">
                    <div class="profile_row">    
                        <div>
                            <label>First name:</label>
                            <div class="content">
                                <?php echo $profile->getFirstName() ?>
                            </div>
                        </div>
                    </div>
                    <div class="profile_row">    
                        <div>
                            <label>Middle name:</label>
                            <div class="content">
                                <?php echo $profile->getMiddleName() ?>
                            </div>
                        </div>
                    </div>
                    <div class="profile_row">    
                        <div>
                            <label>Last name:</label>
                            <div class="content">
                                <?php echo $profile->getLastName() ?>
                            </div>
                        </div>
                    </div>
                    <div class="profile_row">    
                        <div>
                            <label>Date of birth:</label>
                            <div class="content">
                                <?php echo date("d/m/Y", strtotime($profile->getDateOfBirth())); ?>
                            </div>
                        </div>
                    </div>
                    <div class="profile_row">    
                        <div>
                            <label>Gender:</label>
                            <div class="content">
                                <?php echo $profile->getGender() ?>&nbsp;
                            </div>
                        </div>
                    </div>
                    <div class="profile_row">    
                        <div>
                            <label>High School:</label>
                            <div class="content">
                                <?php echo $profile->getHighSchool() ?>&nbsp;
                            </div>
                        </div>
                    </div>
                    <div class="profile_row">    
                        <div>
                            <label>Current study:</label>
                            <div class="content">
                                <?php echo $profile->getCurrentStudy() ?>&nbsp;
                            </div>
                        </div>
                    </div>
                    <div class="profile_row">    
                        <div>
                            <label>Studied at:</label>
                            <div class="content">
                                <?php echo $profile->getStudiedAt() ?>&nbsp;
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="profile_details" id="profile_current_studies" style="display:none">
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
                <div class="profile_details" id="profile_achievements" style="display:none">
                    <div id="qualifications_list">
                        <ul>
                            <?php $i = 0; ?>
                            <?php foreach ($profile->getUser()->getQualifications() as $qualification): ?>
                                <li class="<?php echo fmod($i, 2) ? "odd" : "even" ?>">
                                    <div class="qualification-image">
                                        <img alt="<?php echo $qualification->getDescription() ?>, <?php echo $qualification->getInstitution() ?> <?php echo $qualification->getYear() ?>" src="/images/icons/14x14/achievements.png">
                                    </div>
                                    <div class="qualification-name">
                                        <?php echo $qualification->getDescription() ?>, <?php echo $qualification->getInstitution() ?> <?php echo $qualification->getYear() ?>           
                                    </div>
                                </li> 
                                <?php $i++ ?>
                            <?php endforeach; ?>  
                        </ul>
                    </div>
                    <div id="awards_list">
                        <ul>
                            <?php $i = 0; ?>
                            <?php foreach ($profile->getUser()->getAwards() as $award): ?>
                                <li class="<?php echo fmod($i, 2) ? "odd" : "even" ?>">
                                    <div class="award-image">
                                        <img alt="<?php echo $award->getDescription() ?>, <?php echo $award->getInstitution() ?> <?php echo $award->getYear() ?>" src="/images/icons/14x14/achievements.png">
                                    </div>
                                    <div class="award-name">
                                        <?php echo $award->getDescription() ?>, <?php echo $award->getInstitution() ?> <?php echo $award->getYear() ?>           
                                    </div>
                                </li>
                                <?php $i++ ?>
                            <?php endforeach; ?>      
                        </ul>
                    </div>
                </div> 
            </div>
            <div class="correspond-right-block" style="width: 285px;">
                <h2>Mutual Correspondents</h2>
                <div id="mutual_correspondents_list"></div>
            </div> 
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#heading-tabs li").click(function(){
            $("#heading-tabs li").removeClass("current");
            $(this).addClass("current");
            $(this).css({"color": "#8A8A8A !important"});
            $(".profile_details").css({"color": "#FFFFFF !important"});            
            $(".profile_details").hide();             
            $("#" + $(this).attr("tab_content_id")).show();
        });   
    });
</script>    