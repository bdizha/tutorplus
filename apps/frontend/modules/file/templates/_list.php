<div id="folder_content">
    <div id="folder_panel">
        <div id="folder_heading">
            <div id="folder_heading_name">Name</div>
            <div id="folder_heading_size">Size</div>
            <div id="folder_heading_date_modified">Date Modified</div>
        </div>
        <div id="folder_actual_content">
            <ul>
                <?php $isOdd = true ?>
                <?php $usedSpace = 0 ?>
                <?php $startingLevel = 0 ?>
                <?php foreach ($fileSystem as $key => $folder): ?>
                    <?php // determing where to start indending ?>
                    <?php if ($key == 0): ?>
                        <?php $startingLevel = $folder['level'] ?>
                    <?php endif; ?>
                    <li style="display: <?php echo ($key == 0 || in_array($folder['id'], $folderPath) || in_array($folder['parent_id'], $folderPath)) ? 'block' : 'none' ?>;" class="<?php echo ($isOdd) ? 'odd' : 'even' ?> listing_parent_id_<?php echo $folder['parent_id'] ?> <?php echo ($folder['id'] == $addedFolderId) ? 'added' : '' ?>">
                        <div class="folder_actual_name">
                            <input type="hidden" value="<?php echo $folder['id'] ?>" id="folderId_<?php echo $folder['id'] ?>"/>
                            <span style="margin-left: <?php echo ($folder['level'] - $startingLevel) * 20 ?>px;" class="<?php echo (in_array($folder['id'], $folderPath)) ? 'open' : 'closed' ?>">
                                <?php echo $folder['name'] ?>
                            </span>
                        </div>
                        <div class="folder_actual_size"><?php echo $folder['nb_items'] ?> <?php echo ($folder['nb_items'] != 1) ? "items" : "item" ?></div>
                        <div class="folder_actual_date_modified"><?php echo $folder['updated_at'] ?></div>
                    </li>
                    <?php foreach ($folder['files'] as $file): ?>
                        <li style="display: <?php echo (in_array($folder['id'], $folderPath)) ? 'block' : 'none' ?>;" class="<?php echo (!$isOdd) ? 'odd' : 'even' ?> listing_parent_id_<?php echo $file['folder_id'] ?> <?php echo ($file['id'] == $addedFileId) ? 'added' : '' ?>">
                            <div class="file_actual_name">
                                <span style="margin-left: <?php echo ($folder['level'] - $startingLevel) * 20 + 20 ?>px;" class="pdf">
                                    <?php echo myToolkit::shortenString($file['original_name'], 40) ?>
                                </span>
                            </div>
                            <div class="folder_actual_size"><?php echo (int) ($file['size'] / 1000) ?>KB</div>
                            <div class="folder_actual_date_modified"><?php echo $file['updated_at'] ?></div>
                        </li>
                        <?php $usedSpace += $file['size'] / 1000 ?>
                        <?php $isOdd = !$isOdd ?>
                    <?php endforeach; ?>
                    <?php $isOdd = !$isOdd ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){        
        $(".folder_actual_name span").click(function(){
            var folderId = $(this).siblings("input").val();
            
            if($(this).hasClass("closed"))
            {            
                $(this).removeClass("closed");
                $(this).addClass("open");            
                $(".listing_parent_id_" + folderId).show();                
            }            
            else
            {
                $(this).removeClass("open");
                $(this).addClass("closed");
                $(".listing_parent_id_" + folderId).hide();            
                return recursivelyHideFolders(folderId);                
            }
        });
    }); 
    
    function recursivelyHideFolders(folderId){        
        var hasSubFolders = false;            
        $(".listing_parent_id_" + folderId + " .folder_actual_name span").removeClass("open");
        $(".listing_parent_id_" + folderId + " .folder_actual_name span").addClass("closed");
        
        $(".listing_parent_id_" + folderId + " .folder_actual_name").each(function(){
            var folderId = $(this).find("input").val();            
            $(".listing_parent_id_" + folderId).hide();
            
            $(".listing_parent_id_" + folderId + " .folder_actual_name").each(function(){
                hasSubFolders = true;
            });
             
            if(hasSubFolders)
            {
                return recursivelyHideFolders(folderId);
            }
        });
        
        if(!hasSubFolders)
        {
            return false;
        }
    }
</script>