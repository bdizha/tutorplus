<?php use_helper('I18N', 'Date') ?>
<div class="content-block">    
    <h2>Personal Details <span class="actions"><a href="/backend.php/student_inline/<?php echo $profile->getId() ?>/edit" id="edit_personal_details">Edit</a></span></h2>
    <div id="personal_details_container">
        <div class="left-block" style="width: 410px;">
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
        </div>
        <div class="right-block" style="width: 410px;">
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
        </div>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){ 
        $("#edit_personal_details").click(function(){
            openPopup($(this).attr("href"), "460px", "600px", "Edit Personal Details");
            return false;
        });
    });
</script>