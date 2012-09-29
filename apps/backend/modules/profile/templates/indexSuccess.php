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
        <h2>About Me <span class="actions"><a id="edit_profile_about" href="/backend.php/profile_about">Edit</a></span></h2>
        <div class="full-block"> 
            <div class="even-row about-me">
                <div class="row-column">
                    I love reading anything I find in my hands as well as playing pool and foolsbal games.
                </div>
                <div class="row-column">
                    <div class="about-me-photo">
                        <img height="128px" width="128px" alt="Tutorplus Student" src="/avatars/128.png" />
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <div class="content-block">     
        <h2>Academic Info <span class="actions"><a id="edit_profile_about" href="/backend.php/profile_about">Edit</a></span></h2>
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
                <?php if ($sf_user->getUserType() == sfGuardUserTable::TYPE_STUDENT): ?>
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
    });

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