<?php use_helper('I18N', 'Date') ?>

<?php slot('nav_vertical') ?>
<?php include_component('common', 'menu', $helper->indexLinks()) ?>
<?php end_slot() ?>

<?php slot('breadcrumbs') ?>
<?php include_partial('common/breadcrumbs', $helper->indexBreadcrumbs()) ?>
<?php end_slot() ?>

<div class="sf_admin_heading">
    <h3><?php echo __('Course Announcements', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_container">
    <div class="content-block">
        <div class="top-actions">
            <?php echo $helper->linkToAnnouncementNew() ?>
        </div>
        <div class="full-block">
            <div id="course_announcements">
                <h2>&nbsp;</h2>
                <?php include_partial('course_announcement/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
            </div>   
        </div>
    </div>
</div>
<script type='text/javascript'>
    $(document).ready(function(){    
        $(".announcement").hover(function(){
            $(this).children(".inline-content-actions").show();
        },
        function(){
            $(this).children(".inline-content-actions").hide();
        });
    });
</script>