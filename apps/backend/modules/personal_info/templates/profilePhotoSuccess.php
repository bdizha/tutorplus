<div class="content-block">    
    <h2>Profile Photo</h2>
    <div id="profile_picture_container">
        <div class="profile_row">    
            <div id="photo-left">
                <div id="photo">
                    <img src="/backend.php/profile_show_photo/<?php echo $sf_user->getId() ?>/128/<?php echo time() ?>" alt="<?php echo $sf_user->getName() ?>" title="<?php echo $sf_user->getName() ?>"/>
                </div>
                <?php if ($sf_user->hasPhoto()): ?>
                    <div id="photo-delete">
                        <a href="/backend.php/profile_delete_photo" onclick="if (confirm('Are you sure?'))return true; else return false;">Delete Photo</a>
                    </div>
                <?php endif; ?>
            </div>
            <div id="photo-right">                
                <ul style="clear: both;" class="sf_admin_actions">
                    <li class="sf_admin_action_new">
                        <input type="button" class="button" id="upload_photo" value="Upload New Photo"></input>
                        <?php if ($sf_user->hasPhoto()): ?>
                            <input type="button" class="button" id="crop_photo" value="Re-crop Your Photo"></input>
                        <?php endif; ?>
                    </li>
                </ul>		
                <span class="help-block">Maximum size of 2MB (jpg, gif, png)</span>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){ 
        $("#upload_photo").click(function(){      
            openPopup("/backend.php/profile_upload_photo", "600px", "600px", "Upload A New Photo");
            return false;
        });
        
        $("#crop_photo").click(function(){      
            openPopup("/backend.php/profile_crop_photo", "600px", "600px", "Crop Your profile photo");
            return false;
        });
    });
</script>