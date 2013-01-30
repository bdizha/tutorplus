<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', array("hideMenu" => true)) ?>
<?php include_component('common', 'publicMenu', array("currentParent" => "home")) ?>
<div class="home-top-row">
  <div class="testimonial">
    <a class="photo-link" style="width:50px;height:50px;" href="/profile/batanayi-matuku">
      <img src="/uploads/users/3/normal-50.jpg " class="image" alt="Batanayi Matuku" title="Batanayi Matuku">
    </a>
    <div class="text">
      <h3 class="name">Batanayi Matuku</h3>
      <h5 class="institution">University of South Africa</h5>
      <div class="says">
        TutorPlus is such a platform where one learns real life matters.
      </div>
    </div>
  </div>
  <div class="testimonial">
    <a class="photo-link" style="width:50px;height:50px;" href="/profile/john-kennedy">
      <img src="/uploads/users/9/normal-50.jpg " class="image" alt="John Kennedy" title="John Kennedy">
    </a>
    <div class="text">
      <h3 class="name">David Austin</h3>
      <h5 class="institution">University of Pretoria</h5>
      <div class="says">
        We were very happy with TutorPlus in our first online course so I'd give it a strong
        positive recommendation
      </div>
    </div>
  </div>
  <div class="testimonial">
    <a class="photo-link" style="width:50px;height:50px;" href="/profile/john-kennedy">
      <img src="/uploads/users/9/normal-50.jpg " class="image" alt="John Kennedy" title="John Kennedy">
    </a>
    <div class="text">
      <h3 class="name">David Austin</h3>
      <h5 class="institution">University of Pretoria</h5>
      <div class="says">
        We were very happy with TutorPlus in our first online course so I'd give it a strong
        positive recommendation
      </div>
    </div>
  </div>
</div>
<div class="home-bottom-row">
  <h1>Welcome to TutorPlus!</h1>
  <p class="welcome-message">
    TutorPlus is a <span>collaborative</span> learning platform specifically built to meet all your <span>lifelong</span> learning needs free of charge as we believe education should be easily accessible to <span>anyone</span>, <span>anywhere</span> and <span>anytime</span>. We're partners with the world's most renowned authors and institutions with whom we work closely in preparing and publishing our first-rate courses just for you.
  </p>
</div>
<script type='text/javascript'>
  //<![DATA[
  $(document).ready(function(){
    $("body").css("background","url('/images/watermark_home.png') no-repeat scroll center 55px #FFF");
    $("#middle-column").css("min-height","585px");
  });
  //]]
</script>