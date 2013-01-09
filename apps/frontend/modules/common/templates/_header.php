<?php $isAuthenticated = $sf_user->isAuthenticated() ?>
<div id="main-logo">
  <div id="logo-wrapper">
    <a href="/" title=""></a>              
  </div>
  <div id="moto-wrapper"></div>
  <?php if ($isAuthenticated): ?>
    <?php $profile = $sf_user->getProfile(); ?>
    <?php include_partial('personal_info/photo', array('profile' => $profile, "dimension" => 24, "cssClass" => "menu-photo")) ?>
  <?php else: ?>
    <div id="sign-in-wrapper">
      <a href="<?php echo url_for('@profile_sign_in') ?>">Sign In</a>
    </div>
  <?php endif; ?>
</div>