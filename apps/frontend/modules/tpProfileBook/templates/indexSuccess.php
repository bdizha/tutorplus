<?php use_helper('I18N', 'Date') ?>
<?php include_partial('profile_book/list', array('books' => $profile->getFavouriteBooks(), "helper" => $helper)) ?>