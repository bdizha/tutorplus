<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getLinks()) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->getBreadcrumbs()) ?>
<div id="sf_admin_heading">
    <h3><?php echo $profile->getTitle() . " " . $profile->getName() . "'s biography" ?></h3>
</div>
<div id="sf_admin_container">
    <div id="sf_admin_content">
        <div class="content-block">
            <h2>About me <span class="actions"> <?php if ($sf_user->isCurrent($profile->getId())): ?><span class="actions"><?php echo link_to(__("Edit"), "@profile_biography_edit?id=" . $profile->getId(), array("id" => "edit_profile_biography")) ?></span><?php endif; ?></h2>
            <div class="full-block">
                <div class="profile-biography">
                    <?php include_partial('tpPersonalInfo/photo', array('profile' => $profile, "dimension" => 96)) ?>
                </div>
                <div id="profile_about_me">
                    <?php include_partial('about_me', array('profile' => $profile)) ?>
                </div>
            </div>
        </div>
        <div class="content-block">      
            <h2>Publications <?php if ($sf_user->isCurrent($profile->getId())): ?><span class="actions"><?php echo link_to(__("+ Add"), "@profile_publication_new", array("id" => "add_profile_publication")) ?></span><?php endif; ?></h2>
            <div class="full-block" id="profile_publications">  
                <?php include_partial('tpProfilePublication/list', array('publications' => $profile->getPublications(), "helper" => $helper)) ?>
            </div>
        </div>
        <div class="content-block">      
            <h2>Favourite Books <?php if ($sf_user->isCurrent($profile->getId())): ?><span class="actions"><?php echo link_to(__("+ Add"), "@profile_book_new", array("id" => "add_profile_book")) ?></span><?php endif; ?></h2>
            <div class="full-block" id="profile_books">  
                <?php include_partial('tpProfileBook/list', array('books' => $profile->getFavouriteBooks(), "helper" => $helper)) ?>
            </div>
        </div>
        <div class="content-block">      
            <h2>Interests <?php if ($sf_user->isCurrent($profile->getId())): ?><span class="actions"><?php echo link_to(__("+ Add"), "@profile_interest_new", array("id" => "add_profile_interest")) ?></span><?php endif; ?></h2>
            <div class="full-block" id="profile_interests">  
                <?php include_partial('tpProfileInterest/list', array('interests' => $profile->getInterests(), "helper" => $helper)) ?>  
            </div>
        </div>
    </div>    
</div>
<script type='text/javascript'>
    //<![DATA[
    $(document).ready(function(){
        $("#edit_profile_biography").click(function(){
            openPopup($(this).attr("href"),'410px',"600px","About Me");
            return false;
        });

        $("#add_profile_publication").click(function(){
            openPopup($(this).attr("href"),'410px',"480px","Add A Publication");
            return false;
        });

        $("#add_profile_book").click(function(){
            openPopup($(this).attr("href"),'410px',"480px","Add A Favourite Book");
            return false;
        });

        $("#add_profile_interest").click(function(){
            openPopup($(this).attr("href"),'410px',"480px","Add An Interest");
            return false;
        });

        $("#upload_photo").click(function(){
            openPopup("/profile/upload/photo","600px","300px",$(this).attr("value"));
            return false;
        });

        $("#crop_photo").click(function(){
            openPopup("/profile/crop/photo","600px","600px",$(this).attr("value"));
            return false;
        });
    });

    function fetchProfiles(){
        $('#profile_about_me').load('/profile/biography/ajax');
    }

    function fetchProfilePublications(){
        $('#profile_publications').load('/profile/publication');
    }

    function fetchProfileBooks(){
        $('#profile_books').load('/profile/book');
    }

    function fetchProfileInterests(){
        $('#profile_interests').load('/profile/interest');
    }
    //]]
</script>