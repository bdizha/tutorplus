<?php use_helper('I18N', 'Date') ?>
<?php include_partial('profile_publication/list', array('publications' => $profile->getPublications(), "helper" => $helper)) ?>