<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->publicInfoLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->publicInfoBreadcrumbs()) ?>
<div id="sf_admin_heading">
  <h3><?php echo $profile->getTitle() . " " . $profile->getName() ?></h3>
</div>
<div id="sf_admin_container">
  <div id="sf_admin_content">
    <div class="content-block">
      <h4>Profile info <span class="actions"> <?php if ($sf_user->isCurrent($profile->getId())): ?><span class="actions"><a id="edit_profile_info" href="/profile/info/<?php echo $profile->getId() ?>/edit">Edit</a></span><?php endif; ?></span></h4>
      <div class="full-block">
        <div class="profile-image">
          <?php include_partial('personal_info/photo', array('profile' => $profile, "dimension" => 128)) ?>
        </div>
        <div class="profile-info" id="profile_info">
          <?php include_partial('profile/info', array('profile' => $profile)) ?>
        </div>
      </div>
    </div>
    <div class="content-block">
      <h4>About me <span class="actions"><a id="edit_about_me" href="/profile/1/edit">Edit</a></span></h4>
      <div class="full-block">
        <div id="profile_about_me">
          <div class="no-result">No info added yet.</div>
        </div>
      </div>
    </div>
    <div class="content-block">      
      <h2>Publications <?php if ($sf_user->isCurrent($profile->getId())): ?><span class="actions"><?php echo link_to(__("+ Add"), "@profile_publication_new", array("id" => "add_profile_publication")) ?></span><?php endif; ?></h2>
      <div class="full-block" id="profile_publications">  
        <?php include_partial('profile_publication/list', array('publications' => $profile->getPublications(), "helper" => $helper)) ?>
      </div>
    </div>
    <div class="content-block">      
      <h2>Favourite Books <?php if ($sf_user->isCurrent($profile->getId())): ?><span class="actions"><?php echo link_to(__("+ Add"), "@profile_book_new", array("id" => "add_profile_book")) ?></span><?php endif; ?></h2>
      <div class="full-block" id="profile_books">  
        <?php include_partial('profile_book/list', array('books' => $profile->getFavouriteBooks(), "helper" => $helper)) ?>
      </div>
    </div>
    <div class="content-block">      
      <h2>Interests <?php if ($sf_user->isCurrent($profile->getId())): ?><span class="actions"><?php echo link_to(__("+ Add"), "@profile_interest_new", array("id" => "add_profile_interest")) ?></span><?php endif; ?></h2>
      <div class="full-block" id="profile_interests">  
        <?php include_partial('profile_interest/list', array('interests' => $profile->getInterests(), "helper" => $helper)) ?>  
      </div>
    </div>
  </div>    
</div>
<script type='text/javascript'>
  //<![DATA[
  $(document).ready(function(){
    $("#edit_personal_info").click(function(){
      openPopup($(this).attr("href"),'410px',"600px","Edit Personal Info");
      return false;
    });

    $("#edit_profile_info").click(function(){
      openPopup($(this).attr("href"),'410px',"600px","Edit Profile Info");
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

  function fetchAboutMe(){
    $('#profile_about_me').load('/profile/about/me');
  }

  function fetchProfileInfo(){
    $('#profile_info').load('/profile/info');
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