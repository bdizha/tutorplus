<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getNewLinks($form)) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->newBreadcrumbs($form)) ?>
<?php include_partial('tpCommon/flashes_normal', array('form' => $form)) ?>
<div id="sf_admin_form_container">
    <div id="sf_admin_content">
        <div class="content-block">
            <?php include_partial('tpCommon/tabs', $helper->getTabs($announcements, $newsItems, "new")) ?>
            <div class="tab-block">
                <?php include_partial('tpNewsItem/form', array('news_item' => $news_item, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
                <div id="sf_admin_footer">
                    <?php include_partial('tpNewsItem/form_footer', array('news_item' => $news_item, 'form' => $form, 'configuration' => $configuration)) ?>
                </div>
            </div>
        </div>
    </div>
</div>