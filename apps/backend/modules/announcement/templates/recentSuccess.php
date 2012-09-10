<?php use_helper('I18N', 'Date') ?>
<?php include_partial('announcement/list', array("announcements" => $announcements, "helper" => $helper, "show_more_link" => true)) ?>