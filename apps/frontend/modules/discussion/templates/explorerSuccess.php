<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->explorerLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->explorerBreadcrumbs()) ?>
<div class="sf_admin_heading">
    <h3><?php echo __('Discussion Explorer', array(), 'messages') ?></h3>
</div>
<div id="sf_admin_content">
    <div class="content-block">
        <div id="discussion_container">
            <ul class="top-actions">
                <?php include_partial('discussion/list_actions', array('helper' => $helper)) ?>
            </ul>
            <?php include_partial('discussion/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
            <ul class="sf_admin_actions">
                <?php include_partial('discussion/list_batch_actions', array('helper' => $helper)) ?>
                <?php include_partial('discussion/list_actions', array('helper' => $helper)) ?>
                <?php include_partial('discussion/list_footer', array('helper' => $helper)) ?>
            </ul>
        </div>
    </div>
</div>
<script type='text/javascript'>
    $(document).ready(function(){    
        $(".discussion").hover(function(){
            $(this).children(".inline-content-actions").show();
        },
        function(){
            $(this).children(".inline-content-actions").hide();
        });
    });
</script>