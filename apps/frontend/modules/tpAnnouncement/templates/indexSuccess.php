<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getLinks()) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->getBreadcrumbs()) ?>
<?php include_partial('tpCommon/flashes_normal') ?>
<div id="sf_admin_content">
    <div class="content-block">
        <?php include_partial('tpCommon/tabs', $helper->getTabs($announcements, $newsItems, "index")) ?>
        <div class="tab-block">
            <ul class="sf_admin_actions">
                <?php include_partial('tpAnnouncement/list_actions', array('helper' => $helper)) ?>
            </ul>
            <div id="announcements">
                <?php include_partial('tpAnnouncement/list', array('announcements' => $announcements, 'helper' => $helper)) ?>
            </div>
            <ul class="sf_admin_actions">
                <?php include_partial('tpAnnouncement/list_actions', array('helper' => $helper)) ?>
            </ul>
        </div>
    </div>
</div>
<script type='text/javascript'>
    $(document).ready(function() {
        $(".announcement").hover(function() {
            $(this).children(".inline-content-actions").show();
        },
        function() {
            $(this).children(".inline-content-actions").hide();
        });
    });
</script>
