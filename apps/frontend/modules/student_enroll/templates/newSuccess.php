<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'publicMenu', $helper->newLinks($form)) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->newBreadcrumbs($form)) ?>
<?php end_slot() ?>

<div id="tp_admin_container">
  <div id="tp_admin_heading">
    <h1><?php echo __('Sign Up', array(), 'messages') ?></h1>
  </div>
  <div id="tp_admin_content">
    <div class="left-block">
      <?php include_partial('student_enroll/flashes', array('form' => $form)) ?>
      <div id="sf_admin_form_container">
        <div id="sf_admin_content">
          <?php include_partial('student_enroll/form', array('profile' => $profile, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
        </div>
        <div id="sf_admin_footer">
          <?php include_partial('student_enroll/form_footer', array('profile' => $profile, 'form' => $form, 'configuration' => $configuration)) ?>
        </div>
      </div>
    </div>
    <div class="right-block">
      <h3>Here's what we offer you:</h3>
      <p>Learn relevant life matters from us.</p>
      <p>Freely and openly engage with other people's opinions.</p>
      <h3>Be a lifelong learner!</h3>
      <p>Ready to inspire others? Help us change our mutual living forever.</p>
      <?php include_partial('common/enroll_block') ?>
    </div>
  </div>
</div>