<?php $profile = $sf_user->getProfile() ?>
<div class="profile-overlap">
  <div class="profile-container">
    <div class="photo">
      <?php include_partial('personal_info/photo', array('profile' => $profile, "dimension" => 96)) ?>
    </div>
    <div class="details">
      <div class="name"><?php echo $profile->getName() ?></div>  
      <div class="email"><?php echo $profile->getEmail() ?></div>
      <div class="actions">
        <input type="button" class="button" onclick="document.location.href = '<?php echo url_for('@activity_feed') ?>';" value="+ Share"></input>
        <input type="button" class="button" onclick="document.location.href = '/<?php echo $profile->getSlug() ?>';" value="Profile"></input>
        <input type="button" class="button" onclick="document.location.href = '<?php echo url_for('@profile_sign_out') ?>';" value="Sign Out"></input>
      </div>
    </div>
  </div>
</div>
<script type='text/javascript'>
          $(document).ready(function(){
            var profileRight = parseInt(($(this).width() - middleContentWidth) / 2);
            $(".profile-overlap").css({"right": profileRight + "px"});
            $(".profile-identity a, .dropdown, .reversed-dropdown").click(function(){
              var dropdownSpan = $(".profile-identity span");
              if (dropdownSpan.hasClass("dropdown")) {
                dropdownSpan.removeClass("dropdown");
                dropdownSpan.addClass("reversed-dropdown");
              }
              else{
                dropdownSpan.removeClass("reversed-dropdown");
                dropdownSpan.addClass("dropdown");
              }

              $(".profile-overlap").toggle();
              return false;
            });
          });
</script>