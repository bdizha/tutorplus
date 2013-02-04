<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->geMyLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->getMyBreadcrumbs()) ?>
<div class="sf_admin_heading">
    <h3><?php echo __('My Groups', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_content">
    <div class="content-block">
        <div id="discussion_group_container">
            <ul class="top-actions">
                <?php include_partial('discussion_group/list_actions', array('helper' => $helper)) ?>
            </ul>
            <?php include_partial('discussion_group/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
            <ul class="sf_admin_actions">
                <?php include_partial('discussion_group/list_batch_actions', array('helper' => $helper)) ?>
                <?php include_partial('discussion_group/list_actions', array('helper' => $helper)) ?>
                <?php include_partial('discussion_group/list_footer', array('helper' => $helper)) ?>
            </ul>
        </div>
    </div>
</div>
<script type='text/javascript'>
    $(document).ready(function(){    
        $(".discussion_group").hover(function(){
            $(this).children(".inline-content-actions").show();
        },
        function(){
            $(this).children(".inline-content-actions").hide();
        });
    });
</script>