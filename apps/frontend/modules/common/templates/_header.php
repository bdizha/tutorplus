<?php $isAuthenticated = $sf_user->isAuthenticated() ?>
<div id="main-logo">
  <div id="logo-wrapper">
    <a href="/" title=""></a>              
  </div>
  <div id="moto-wrapper"></div>
  <?php if ($isAuthenticated): ?>
  <?php else: ?>
    <div id="signing-wrapper">
      <input class="button sign-up" value="Sign Up" type="button" onclick="loadUrl('<?php echo url_for('@profile_enroll_new') ?>');"/>
      <input class="button" value="Sign In" type="button" onclick="loadUrl('<?php echo url_for('@profile_sign_in') ?>');"/>
    </div>
  <?php endif; ?>
</div>