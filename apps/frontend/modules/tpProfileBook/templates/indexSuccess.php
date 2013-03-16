<?php use_helper('I18N', 'Date') ?>
<?php include_partial('tpProfileBook/list', array('books' => $profile->getFavouriteBooks(), "helper" => $helper)) ?>