<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->publicInfoLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->publicInfoBreadcrumbs()) ?>
<?php end_slot() ?>

<div id="sf_admin_heading">
    <h3><?php echo $user->getName() ?></h3>
</div>
<div id="sf_admin_content">
    <div class="content-block">      
        <h2>Personal Info <?php if($sf_user->isCurrent($user->getId())): ?><span class="actions"><a id="edit_personal_info" href="/backend.php/personal_info/<?php echo $user->getId() ?>/edit">Edit</a></span><?php endif; ?></h2>
        <div class="full-block"> 
            <div class="even-row about-me">
                <div class="row-column" id="personal_info">
                    <?php echo $user->getProfile()->getAbout(); ?>
                </div>
                <div class="row-column">
                    <div class="about-me-photo">
                        <?php include_partial('personal_info/photo', array('user' => $user, "dimension" => 128)) ?>
                    </div>
                    <div class="profile-photo-block">
                        <?php if ($sf_user->hasPhoto()): ?>
                            <input type="button" class="button" id="upload_photo" value="Change Photo"></input>
                            <input type="button" class="button" id="crop_photo" value="Crop Photo"></input>
                        <?php else: ?>
                            <input type="button" class="button" id="upload_photo" value="Upload Photo"></input>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <div class="content-block">     
        <h2>Academic Info <?php if($sf_user->isCurrent($user->getId())): ?><span class="actions"><a id="edit_academic_info" href="/backend.php/academic_info/<?php echo $user->getId() ?>/edit">Edit</a></span><?php endif; ?></h2>
        <div class="full-block" id="academic_info">
            <?php include_partial('academic_info/academic_info', array('user' => $user)) ?>
        </div>  
    </div>
    <div class="content-block">      
        <h2>Publications <?php if($sf_user->isCurrent($user->getId())): ?><span class="actions"><?php echo link_to(__("+ Add"), "@profile_publication_new", array("id" => "add_profile_publication")) ?></span><?php endif; ?></h2>
        <div class="full-block" id="profile_publications">  
            <?php include_partial('profile_publication/list', array('publications' => $user->getPublications())) ?>
        </div>
    </div>
    <div class="content-block">      
        <h2>Favourite Books <?php if($sf_user->isCurrent($user->getId())): ?><span class="actions"><?php echo link_to(__("+ Add"), "@profile_book_new", array("id" => "add_profile_book")) ?></span><?php endif; ?></h2>
        <div class="full-block" id="profile_books">  
            <?php include_partial('profile_book/list', array('books' => $user->getFavouriteBooks())) ?>
        </div>
    </div>
    <div class="content-block">      
        <h2>Interests <?php if($sf_user->isCurrent($user->getId())): ?><span class="actions"><?php echo link_to(__("+ Add"), "@profile_interest_new", array("id" => "add_profile_interest")) ?></span><?php endif; ?></h2>
        <div class="full-block" id="profile_interests">  
            <?php include_partial('profile_interest/list', array('interests' => $user->getInterests())) ?>  
        </div>
    </div>
</div>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){
        $("#edit_personal_info").click(function(){
            openPopup($(this).attr("href"), '410px', "600px", "Edit Personal Info");
            return false;
        });
        
        $("#edit_academic_info").click(function(){
            openPopup($(this).attr("href"), '410px', "600px", "Edit Academic Info");
            return false;
        });
        
        $("#add_profile_publication").click(function(){
            openPopup($(this).attr("href"), '410px', "480px", "Add A Publication");
            return false;
        });
        
        $("#add_profile_book").click(function(){
            openPopup($(this).attr("href"), '410px', "480px", "Add A Favourite Book");
            return false;
        });
        
        $("#add_profile_interest").click(function(){
            openPopup($(this).attr("href"), '410px', "480px", "Add An Interest");
            return false;
        });
        
        $("#upload_photo").click(function(){      
            openPopup("/backend.php/profile_upload_photo", "600px", "300px", $(this).attr("value"));
            return false;
        });
        
        $("#crop_photo").click(function(){      
            openPopup("/backend.php/profile_crop_photo", "600px", "600px", $(this).attr("value"));
            return false;
        });
    });
    
    function fetchPersonalInfo(){
        $('#personal_info').load('/backend.php/personal_info');
    }
    
    function fetchAcademicInfo(){
        $('#academic_info').load('/backend.php/academic_info');
    }

    function fetchPublications(){
        $('#profile_publications').load('/backend.php/profile_publication');
    }
    
    function fetchFavouriteBooks(){
        $('#profile_books').load('/backend.php/profile_book');
    }
    
    function fetchInterests(){
        $('#profile_interests').load('/backend.php/profile_interest');
    }
    //]]
</script>