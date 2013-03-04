<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->explorerLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->explorerBreadcrumbs()) ?>
<?php include_partial('common/flashes_normal') ?>
<div id="sf_admin_content">
    <div class="content-block">
        <?php include_partial('common/tabs', array('tabs' => $helper->getTabs($myDiscussions, $exploreDiscussions, "explorer"))) ?>
        <div class="tab-block">
            <?php if (!$exploreDiscussions->count()): ?>
                There isn't any discussions started currently.
            <?php else: ?> 
                <ul class="sf_admin_actions">
                    <?php include_partial('discussion/list_actions', array('helper' => $helper)) ?>
                </ul>
                <?php include_partial('discussion/list', array('discussions' => $exploreDiscussions, 'helper' => $helper)) ?>
            <?php endif; ?>
            <ul class="sf_admin_actions">
                <?php include_partial('discussion/list_actions', array('helper' => $helper)) ?>
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
