<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
	<?php include_partial('common/nav_vertical_tertiary', array("item_level_1" => "admissions", "item_level_2" => "admission_statistics", "current_route" => "dropout")) ?>
<?php end_slot() ?>