<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->indexLinks($course)) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs($course)) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3><?php echo __('Course Files', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_form_container">
    <div id="sf_admin_content">
        <div class="content-block">
            <div id="file_system" class="">
                <?php include_partial('file/list', array('fileSystem' => $fileSystem, 'folderPath' => array(), 'addedFolderId' => 0, 'addedFileId' => 0)) ?>
            </div>
        </div>
        <?php include_partial('common/actions', array('actions' => $helper->indexContentActions())) ?>
    </div>
</div>
<script type='text/javascript'>
    $(document).ready(function(){
        $(".sf_admin_action_add_folder input").click(function(){
            // set the folder section to be able to determine possible patent folders
            $.get('/folder/section/courses', function(){});
            openPopup("/folder/new", '600px', "480px", "<?php echo __('Create Folder', Array(), 'messages') ?>");
            return false;
        });
        
        $(".sf_admin_action_upload_file input").click(function(){
            // set the folder section to be able to determine possible patent folders
            $.get('/folder/section/courses', function(){});
            openPopup("/file/new", '600px', "480px", "<?php echo __('Upload File', Array(), 'messages') ?>");
            return false;
        });
    });

    function fetchFileSystem(){
        $.get('/course/files', showFileSystem);
    }

    function showFileSystem(res){
        $('#file_system').html(res);
    }
</script>