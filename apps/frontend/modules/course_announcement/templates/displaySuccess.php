<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->indexLinks($course)) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs($course)) ?>
<?php end_slot() ?>

<div id="sf_admin_content">
    <div class="content-block">
        <h2>Announcements</h2>   
        <div id="announcements" class="">
            <?php include_partial('announcement/list', array("announcements" => $course->getAnnouncements(), "helper" => $helper, "showActions" => true)) ?>
        </div>
        <div class="announcement-action">
            <ul class="sf_admin_actions" class="clear">
                <?php echo $helper->linkToAnnounce() ?>
            </ul>
        </div>
    </div>
</div>
<script type='text/javascript'>
    $(document).ready(function(){
        $("#announcements .edit").click(function(){    
            openPopup($(this).attr("href"), '600px', '510px', "Edit Announcement:");
            return false;
        });
        
        $(".sf_admin_action_announce input").click(function(){
            openPopup('/announcement/new', '600px', "500px", "<?php echo __('Add Announcement', Array(), 'messages') ?>");
            return false;
        });
    });
        
    function fetchAnnouncements(){
        window.location = "/course/announcement";
    }
</script>