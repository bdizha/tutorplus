<?php slot('menu') ?>
<?php $i = 0; ?>	
<?php $menuItemsCount = count($menu) ?>	
<div id="top-menu">
    <ul>
        <?php foreach ($menu as $key => $menuItem): ?>
            <li class="separator"></li>
            <li class="<?php echo ($i == 1 || $i == $menuItemsCount) ? ($i == 1) ? "first " : "last "  : "" ?>
                <?php echo (!empty($current_parent) && $current_parent == $key) ? "active" : "normal" ?>">
                    <?php $params = (isset($menuItem["param"])) ? "?" . $menuItem["param"] . "=" . $sf_user->getGuardUser()->getSlug() : "" ?>
                    <?php echo link_to(__($menuItem["details"]["label"]), '@' . $menuItem["details"]["route"] . $params) ?>
            </li>
        <?php endforeach; ?>
        <?php $i++ ?>
    </ul>
    <br style="clear: left;"/>
</div>
<?php end_slot() ?>