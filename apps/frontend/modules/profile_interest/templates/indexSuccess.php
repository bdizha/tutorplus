<?php use_helper('I18N', 'Date') ?>
<?php include_partial('profile_interest/list', array('interests' => $profile->getInterests(), "helper" => $helper)) ?>