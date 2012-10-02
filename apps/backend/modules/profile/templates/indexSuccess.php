<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->aboutLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->aboutBreadcrumbs()) ?>
<?php end_slot() ?>

<div id="sf_admin_heading">
    <h3><?php echo $sf_user->getProfile()->getName() ?></h3>
</div>
<div id="sf_admin_content">
    <div class="content-block">      
        <h2>Personal Info <span class="actions"><a id="edit_personal_info" href="/backend.php/personal_info/<?php echo $sf_user->getId() ?>/edit">Edit</a></span></h2>
        <div class="full-block"> 
            <div class="even-row about-me">
                <div class="row-column" id="personal_info">
                    <?php echo $sf_user->getGuardUser()->getProfile()->getAbout() ?>
                </div>
                <div class="row-column">
                    <div class="about-me-photo">
                        <?php include_partial('personal_info/photo', array('user' => $sf_user->getGuardUser(), "dimension" => 128)) ?>
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
        <h2>Academic Info <span class="actions"><a id="edit_academic_info" href="/backend.php/personal_info/<?php echo $sf_user->getId() ?>/edit">Edit</a></span></h2>
        <div class="full-block">
            <div class="course_info">
                <div class="even-row">
                    <div class="row-column">
                        <span class="label">Current study:</span> <?php echo $sf_user->getProfile()->getCurrentStudy() ?>
                    </div>
                    <div class="row-column">
                        <span class="label">Department:</span> Education
                    </div>
                </div>
                <div class="even-row">
                    <div class="row-column">
                        <span class="label">Institution:</span> University of Cape Town (UCT)
                    </div>
                    <div class="row-column">
                        <span class="label">Studied at:</span> <?php echo $sf_user->getProfile()->getStudiedAt() ?>
                    </div>
                </div>
                <?php if ($sf_user->getType() == sfGuardUserTable::TYPE_STUDENT): ?>
                    <div class="even-row">
                        <div class="row-column">
                            <span class="label">High School:</span> <?php echo $sf_user->getProfile()->getHighSchool() ?>
                        </div>
                        <div class="row-column">
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>  
    </div>
    <div class="content-block">      
        <h2>Publications  <span class="actions"><?php echo link_to(__("+ Add"), "@profile_publication_new", array("id" => "add_profile_publication")) ?></span></h2>
        <div class="full-block" id="profile_publications">  
            <?php include_partial('profile_publication/list', array('publications' => $profile->getPublications())) ?>
        </div>
    </div>
    <div class="content-block">      
        <h2>Favourite Books  <span class="actions"><?php echo link_to(__("+ Add"), "@profile_book_new", array("id" => "add_profile_book")) ?></span></h2>
        <div class="full-block" id="profile_books">  
            <?php include_partial('profile_book/list', array('books' => $profile->getFavouriteBooks())) ?>
        </div>
    </div>
    <div class="content-block">      
        <h2>Interests  <span class="actions"><?php echo link_to(__("+ Add"), "@profile_interest_new", array("id" => "add_profile_interest")) ?></span></h2>
        <div class="full-block" id="profile_interests">  
            <?php include_partial('profile_interest/list', array('interests' => $profile->getInterests())) ?>  
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