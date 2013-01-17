<?php slot('top-menu') ?>
<?php $i = 0; ?>	
<?php $menuItemsCount = count($menu) ?>	
<ul>
  <?php foreach ($menu as $key => $menuItem): ?>
    <?php $i++ ?>
    <li class="<?php echo (!empty($currentParent) && $currentParent == $key) ? "active" : "normal" ?><?php echo ($i == 1) ? " first" : "" ?>">
      <?php $params = (isset($menuItem["param"])) ? "?" . $menuItem["param"] . "=" . $sf_user->getProfile()->getSlug() : "" ?>
      <?php echo link_to(__($menuItem["details"]["label"]), '@' . $menuItem["details"]["route"] . $params) ?>
    </li>
  <?php endforeach; ?>
</ul>
<?php end_slot() ?>
<?php slot('left-column') ?>
<?php $i = 0; ?>	
<?php $currentParentMenu = $menu[$currentParent]; ?>
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
                  <li id="<?php echo $linkItem["route"] ?>_item" class="<?php echo $counter == 1 ? "first " : "" ?><?php echo $itemId2 ?>">
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
    $(".menu-item").click(function(){
      var childItemId = $(this).next().attr("id");
      hideMenuItemsChildren(childItemId);
      $(this).next().toggle();

      if ($(this).parent().attr("id") == "nav-selected") {
        $(this).parent().attr("id","");
      }
      else{
        $(this).parent().attr("id","nav-selected");
      }
      return false;
    });

    function hideMenuItemsChildren(childItemId){
      $(".menu-item-children").each(function(){
        if (childItemId != this.id) {
          $(this).hide();
          $(this).parent().attr("id","");
        }
      });
    }
  });
</script>
<?php end_slot() ?>