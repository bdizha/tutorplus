<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getEditLinks($announcement)) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->getEditBreadcrumbs($announcement)) ?>
<?php include_partial('tpCommon/flashes_normal', array('form' => $form)) ?>
<div id="sf_admin_content">
    <div class="content-block">
        <?php include_partial('tpCommon/tabs', $helper->getTabs($announcements, $newsItems, "edit", $announcement)) ?>
        <div class="tab-block">
            <?php include_partial('tpAnnouncement/form', array('announcement' => $announcement, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
            <div id="sf_admin_footer">
                <?php include_partial('tpAnnouncement/form_footer', array('announcement' => $announcement, 'form' => $form, 'configuration' => $configuration)) ?>
            </div>
        </div>
    </div>
</div>
