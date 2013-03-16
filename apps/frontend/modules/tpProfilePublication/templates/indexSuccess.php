<?php use_helper('I18N', 'Date') ?>
<?php include_partial('tpProfilePublication/list', array('publications' => $profile->getPublications(), "helper" => $helper)) ?>