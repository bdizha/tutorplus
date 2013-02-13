<?php slot('public-menu') ?>
<?php $menuItemsCount = count($menu) ?>
<?php if (!isset($hideMenu) || !$hideMenu): ?>
<ul>
	<?php foreach ($menu as $key => $menuItem): ?>
	<li
		class="<?php echo (!empty($currentParent) && $currentParent == $key) ? "active" : "normal" ?>">
		<?php $params = (isset($menuItem["param"])) ? "?" . $menuItem["param"] . "=" . $sf_user->getProfile()->getSlug() : "" ?>
		<?php echo link_to(__($menuItem["details"]["label"]), '@' . $menuItem["details"]["route"] . $params) ?>
	</li>
	<?php endforeach; ?>
</ul>
<?php endif; ?>
<?php end_slot() ?>