<div class="profile-image">
    <?php include_partial('tpPersonalInfo/photo', array('profile' => $profile, "dimension" => 96)) ?>
    <div class="photo-action">
        <?php if ($sf_user->isCurrent($profile->getId())): ?>
            <?php if ($sf_user->hasPhoto()): ?>
                <input type="button" class="button" id="upload_photo" value="Change Photo"></input>
                <input type="button" class="button" id="crop_photo" value="Crop Photo"></input>
            <?php else: ?>
                <input type="button" class="button" id="upload_photo" value="Upload Photo"></input>
            <?php endif; ?>
        <?php else: ?>
            <input type="button" class="button" id="send_email" value="Send Email"></input>
        <?php endif; ?>
    </div>
</div>
<div class="profile-info" id="profile_info">
    <div class="profile-row">
        <div class="row-label">
            Institution:
        </div>
        <div class="row-value">
            <?php echo $profile->getInstitution() ?>                 
        </div>
    </div>
    <div class="profile-row">
        <div class="row-label">
            High school:
        </div>
        <div class="row-value">
            <?php echo $profile->getHighSchool() ?>                        
        </div>
    </div>
    <div class="profile-row">
        <div class="row-label">
            Studied at:
        </div>
        <div class="row-value">
            <?php echo $profile->getStudiedAt() ?>            
        </div>
    </div>
    <div class="profile-row">
        <div class="row-label">
            Current study:
        </div>
        <div class="row-value">
            <?php echo $profile->getCurrentStudy() ?>        
        </div>          
    </div>
</div>