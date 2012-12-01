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
<?php slot('column') ?>
<?php $i = 0; ?>	
<?php $currentParentMenu = $menu[$current_parent]; ?>
<div id="left-column">
    <ul>	
        <?php foreach ($currentParentMenu["children"] as $child => $childItem): ?>	
            <?php $i++; ?>
            <?php $itemId = ($child == $current_child) ? "id='nav-selected'" : "" ?>
            <div class="menu-item" style="display:none"></div>
            <?php if ($currentParentMenu["type"] == "Many" || ($currentParentMenu["type"] == "One" && $child == $current_child)): ?>
                <li <?php echo $itemId ?>>
                    <div class="menu-item">
                        <div class="menu-heading"><span><?php echo __($childItem["details"]["label"]) ?></span></div>
                    </div>
                    <div id="child-item-<?php echo $i ?>" class="menu-item-children" style="display: <?php echo empty($itemId) ? "none" : "block" ?>;">
                        <ol>
                            <?php $counter = 0; ?>                                    
                            <?php foreach ($childItem["children"] as $link => $linkItem): ?>
                                <?php if (!isset($linkItem["command"]) || (isset($linkItem["command"]) && !(boolean) $$linkItem["command"])): ?>
                                    <?php $counter++ ?>
                                    <?php $itemId2 = ($link == $current_link) ? "selected" : "" ?>
                                    <?php $params = (isset($linkItem["param"])) ? "?" . $linkItem["param"] . "=" . $$linkItem["param"] : "" ?>
                                    <li id="<?php echo $linkItem["route"] ?>_item" <?php echo $counter == count($childItem["children"]) ? "style='border-bottom:none;'" : "" ?> class="<?php echo $counter == 1 ? "first " : "" ?><?php echo $itemId2 ?>">
                                        <?php echo link_to(__($linkItem["label"]), '@' . $linkItem["route"] . $params) ?>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ol>
                    </div>				
                </li>
            <?php endif; ?>	
        <?php endforeach; ?>
    </ul>			
</div>
<script type='text/javascript'>
    $(document).ready(function(){
        
        // configure left column css
        // resizeLeftColumnCss();
        
        $(".menu-item").click(function(){
            var child_item_id = $(this).next().attr("id");
            hideMenuItemsChildren(child_item_id);				
            $(this).next().toggle();
            
            if($(this).parent().attr("id") == "nav-selected"){
                $(this).parent().attr("id", "");
            }
            else{
                $(this).parent().attr("id", "nav-selected");
            }
            return false;
        });

        function hideMenuItemsChildren(child_item_id){
            $(".menu-item-children").each(function(){
                if(child_item_id != this.id){
                    $(this).hide();
                    $(this).parent().attr("id", "");
                }
            });
        }
    });

    function resizeLeftColumnCss(){
        var bodyWidth = $("body").width();
        var innerContainerWrapperWidth = $("#inner-container-wrapper").width();
        var calculatedLeft = (bodyWidth - innerContainerWrapperWidth) / 2;
        $("#left-column").css("left", calculatedLeft - 2);
    }
</script>
<?php end_slot() ?>