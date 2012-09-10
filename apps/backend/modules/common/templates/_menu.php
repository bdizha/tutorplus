<?php slot('nav_horizontal') ?>
<?php $i = 0; ?>	
<?php $menuItemsCount = count($menu) ?>	
<div id="top-menu">
    <ul>
        <?php foreach ($menu as $key => $menuItem): ?>
            <li class="<?php echo ($i == 1 || $i == $menuItemsCount) ? ($i == 1) ? "first " : "last "  : "" ?><?php echo (!empty($current_parent) && $current_parent == $key) ? "active" : "normal" ?>">
                <?php echo link_to(__($menuItem["details"]["label"]), '@' . $menuItem["details"]["route"]) ?>
            </li>
        <?php endforeach; ?>
        <?php $i++ ?>
    </ul>
    <br style="clear: left;"/>
</div>
<?php end_slot() ?>
<?php $i = 0; ?>	
<?php $currentParentMenu = $menu[$current_parent]; ?>
<div id="left-column">
    <ul>	
        <?php foreach ($currentParentMenu["children"] as $child => $childItem): ?>	
            <?php // myToolkit::debug($currentParentMenu["children"]); ?>
            <?php $i++; ?>
            <?php $id = ($child == $current_child) ? "id='nav-selected'" : "" ?>
            <div class="menu-item" style="display:none" <?php //echo $linkItem . ":" . $item_level_2      ?>></div>	
            <?php //myToolkit::debug($current_child); ?>
            <?php if ($currentParentMenu["type"] == "Many" || ($currentParentMenu["type"] == "One" && $child == $current_child)): ?>
                <li <?php echo $id ?>>
                    <div class="menu-item">
                        <?php echo link_to(__($childItem["details"]["label"]), '@' . $childItem["details"]["route"], array("class" => "menu-link")) ?>
                    </div>
                    <?php if (isset($is_profile) && $is_profile && $i == 1): ?>
                        <div class="profile-photo">
                            <img width="151" alt="Batanayi Matuku" src="https://lh5.googleusercontent.com/-J4chDl4M2ZI/AAAAAAAAAAI/AAAAAAAAAAA/ylxejGmnnkM/s77-c-k/photo.jpg?fb=s">
                        </div>
                    <?php endif; ?>
                    <div id="child-item-<?php echo $i ?>" class="menu-item-children" style="display: <?php echo empty($id) ? "none" : "block" ?>;">
                        <ol>
                            <?php $counter = 0; ?>                                    
                            <?php foreach ($childItem["children"] as $link => $linkItem): ?>
                                <?php $counter++ ?>
                                <?php $id2 = ($link == $current_link) ? "selected" : "" ?>
                                <li id="<?php echo $linkItem["route"] ?>_item" <?php echo $counter == count($childItem["children"]) ? "style='border-bottom:none;'" : "" ?> class="<?php echo $counter == 1 ? "first " : "" ?><?php echo $id2 ?>">
                                    <?php echo link_to(__($linkItem["label"]), '@' . $linkItem["route"]) ?>
                                </li>
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
        
        // resize the main container height
        resizeMainContainerWrapperHeight();
        
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
            
            // resize the main container height
            resizeMainContainerWrapperHeight();
        }
    });

    function resizeMainContainerWrapperHeight(){
        if( $("#main-container-wrapper").height() < $("#left-column").height())
            $("#main-container-wrapper").height($("#left-column").height());
    }
</script>