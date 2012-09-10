<?php use_helper('DoctrineMenu') ?>

<?php $root_menu = get_doctrine_menu('root') ?>
<?php $menu_items = $root_menu->getChildren() ?>
<?php $i = 0 ?>	
<div id="top-menu">
    <ul>
        <?php foreach ($menu_items as $key => $menu_item): ?>
            <li class="<?php echo ($i == 1 || $i == $menu_count) ? ($i == 1) ? "first " : "last "  : "" ?><?php echo (!empty($route_name) && (strpos($route_name, $menu_item->getRoute()) !== false)) ? "active" : "normal" ?>">
                <?php echo link_to(__($menu_item->getName()), '@' . $menu_item->getRoute()) ?>
            </li>
        <?php endforeach; ?>
        <?php $i++ ?>
    </ul>
    <br style="clear: left;"/>
</div>