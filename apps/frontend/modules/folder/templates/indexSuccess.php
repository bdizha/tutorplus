<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_partial('common/nav_vertical', array("item_level_1" => "documents", "item_level_2" => "file_system", "current_route" => "folder")) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', array('breadcrumbs' => array("File System" => "folder", __('My Documents', array(), 'messages') => "folder"))) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3><?php echo __('My Documents', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">
    <div id="sf_admin_content">
        <ul class="sf_admin_actions" style="clear:both">
            <li class="sf_admin_actions_add_folder">
                <input type="button" class="button" value="+ Create Folder"/>
            </li>
            <li class="sf_admin_actions_upload_file">
                <input type="button" class="button" value="+ Upload File"/>
            </li>
        </ul>
        <div class="content-block">
            <div id="file_system">
                <?php include_partial('file/list', array('fileSystem' => $fileSystem, 'folderPath' => array(), 'addedFolderId' => 0, 'addedFileId' => 0)) ?>
            </div>
        </div>
        <ul class="sf_admin_actions" style="clear:both">
            <li class="sf_admin_actions_add_folder">
                <input type="button" class="button" value="+ Create Folder"/>
            </li>
            <li class="sf_admin_actions_upload_file">
                <input type="button" class="button" value="+ Upload File"/>
            </li>
        </ul>
    </div>
</div>
<script type='text/javascript'>
    $(document).ready(function(){
        $(".sf_admin_actions_add_folder input").click(function(){
            // set the folder section to be able to determine possible patent folders
            $.get('/folder_section/documents', function(){});
            openPopup("/folder/new", '600px', "480px", "<?php echo __('Create Folder', Array(), 'messages') ?>");
            return false;
        });
        
        $(".sf_admin_actions_upload_file input").click(function(){
            // set the folder section to be able to determine possible patent folders
            $.get('/folder_section/documents', function(){});
            openPopup("/file/new", '600px', "480px", "<?php echo __('Upload File', Array(), 'messages') ?>");
            return false;
        });
    });

    function fetchFileSystem(){
        $.get('/file', showFileSystem);
    }

    function showFileSystem(res){
        $('#file_system').html(res);
    }
</script>