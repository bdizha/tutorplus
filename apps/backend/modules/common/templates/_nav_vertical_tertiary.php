<?php use_helper('DoctrineMenu') ?>
<?php slot('nav_horizontal') ?>
<?php include_partial('common/nav_horizontal', array("route_name" => $item_level_1)) ?>
<?php end_slot() ?>

<?php $root_menu = get_doctrine_menu('root') ?>
<?php $menu_items = $root_menu->getChildren() ?>

<?php if (isset($include_top_menu)): ?>		
    <?php include_partial($module . "/" . $partial, array()) ?>
<?php endif; ?>
<?php foreach ($menu_items as $key => $menu_item_1): ?>
    <?php $i = 0 ?>	
    <?php if ($menu_item_1->getRoute() == $item_level_1): ?>
        <div id="left-column">
            <ul>	
                <?php foreach ($menu_item_1->getChildren() as $key => $menu_item_2): ?>
                    <?php $i++; ?>
                    <?php $styleId = ($menu_item_2->getRoute() == $item_level_2) ? "id='nav-selected'" : "" ?>				
                    <li <?php echo $styleId ?>>
                        <div class="menu-item">
                            <?php echo link_to(__($menu_item_2->getName()), '@' . $menu_item_2->getRoute(), array("class" => "menu-link")) ?>
                        </div>					
                        <?php if ($menu_item_2->getChildren()): ?>
                            <div id="child-item-<?php echo $i ?>" class="menu-item-children" style="display: <?php echo empty($styleId) ? "none" : "block" ?>;">
                                <ol>
                                    <?php $counter = 0; ?>
                                    <?php foreach ($menu_item_2->getChildren() as $key => $menu_item_3): ?>							
                                        <?php $query = ""; ?>
                                        <?php $counter++ ?>
                                        <?php if ($sf_user->getMyAttribute($menu_item_3->getRoute() . "_id", false)): ?>
                                            <?php $query = "?id=" . $sf_user->getMyAttribute($menu_item_3->getRoute() . "_id", 1); ?>
                                        <?php endif; ?>
                                        <?php $styleId2 = ($menu_item_3->getRoute() == $current_route) ? "selected" : "" ?>
                                        <li id="<?php echo $menu_item_3->getRoute() ?>_item" <?php echo $counter == count($menu_item_2->getChildren()) ? "style='border-bottom:none;'" : "" ?> class="<?php echo $counter == 1 ? "first " : "" ?><?php echo $styleId2 ?>">
                                            <?php echo link_to(__($menu_item_3->getLabel()), '@' . $menu_item_3->getRoute() . $query) ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                        <?php endif; ?>					
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php if (isset($include_bottom_block)): ?>		
                <?php include_partial($bottom_block, array()) ?>
            <?php endif; ?>			
        </div>	
    <?php endif; ?>
<?php endforeach; ?>
<script type='text/javascript'>
    $(document).ready(function(){
        $(".menu-item").click(function(){
            var child_item_id = $(this).next().attr("id");
            hideMenuItemsChildren(child_item_id);				
            $(this).next().toggle();
            return false;
        });

        function hideMenuItemsChildren(child_item_id){
            $(".menu-item-children").each(function(){
                if(child_item_id != this.id){
                    $(this).hide();
                }
            });
        }
    });
</script>