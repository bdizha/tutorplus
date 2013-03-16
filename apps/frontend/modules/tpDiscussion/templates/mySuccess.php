<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getLinks("my_discussions")) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->getBreadcrumbs("my_discussions", "My Discussion", "my/discussions")) ?>
<?php include_partial('tpCommon/flashes_normal') ?>
<div id="sf_admin_content">
    <div class="content-block">
        <?php include_partial('tpCommon/tabs', array('tabs' => $helper->getTabs($myDiscussions, $myDiscussions, "my"))) ?>
        <div class="tab-block">
            <?php if (!$myDiscussions->count()): ?>
                You don't have any started discussions yet.
            <?php else: ?> 
                <ul class="sf_admin_actions">
                    <?php include_partial('tpDiscussion/list_actions', array('helper' => $helper)) ?>
                </ul>
                <?php include_partial('tpDiscussion/list', array('discussions' => $myDiscussions, 'helper' => $helper)) ?>
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
