<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', array("hideMenu" => true)) ?>
<?php include_component('tpCommon', 'publicMenu', array("currentParent" => "home")) ?>
<div class="home-bottom-row">
  <h1>Welcome, learner!</h1>
  <p class="welcome-message">
    TutorPlus is a <span>collaborative</span> learning platform specifically built to meet all your <span>lifelong</span> learning needs free of charge as we believe education should be easily accessible to <span>anyone</span>, <span>anywhere</span> and <span>anytime</span>. We're partners with Higher Education (HE) institutions with whom we work closely in preparing and publishing our first-rate courses just for you.
  </p>
</div>
<script type='text/javascript'>
  //<![DATA[
  $(document).ready(function(){
    $("body").css("background","url('/images/home_icon.jpg') no-repeat scroll center 74px #FFF");
    $("#middle-column").css("min-height","653px");
  });
  //]]
</script>