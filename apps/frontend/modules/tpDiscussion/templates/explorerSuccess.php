<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getLinks("discussion_explorer")) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->getBreadcrumbs("discussion_explorer", "Discussion Explorer", "discussion/explorer")) ?>
<?php include_partial('tpCommon/flashes_normal') ?>
<div id="sf_admin_content">
    <div class="content-block">
        <?php include_partial('tpCommon/tabs', array('tabs' => $helper->getTabs($myDiscussions, $exploreDiscussions, "explorer"))) ?>
        <div class="tab-block">
            <?php if (!$exploreDiscussions->count()): ?>
                There isn't any discussions started currently.
            <?php else: ?> 
                <ul class="sf_admin_actions">
                    <?php include_partial('tpDiscussion/list_actions', array('helper' => $helper)) ?>
                </ul>
                <?php include_partial('tpDiscussion/list', array('discussions' => $exploreDiscussions, 'helper' => $helper)) ?>
            <?php endif; ?>
            <ul class="sf_admin_actions">
                <?php include_partial('tpDiscussion/list_actions', array('helper' => $helper)) ?>
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
