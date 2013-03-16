<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getNewLinks($form)) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->newBreadcrumbs($form)) ?>
<?php include_partial('tpCommon/flashes_normal', array('form' => $form)) ?>
<div id="sf_admin_form_container">
    <div id="sf_admin_content">
        <div class="content-block">
            <?php include_partial('tpCommon/tabs', array('tabs' => $helper->getTabs($myDiscussions, $exploreDiscussions, "new"))) ?>
            <div class="tab-block">
                <?php include_partial('tpDiscussion/form', array('discussion' => $discussion, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
            </div>
        </div>
        <div id="sf_admin_footer">
            <?php include_partial('tpDiscussion/form_footer', array('discussion' => $discussion, 'form' => $form, 'configuration' => $configuration)) ?>
        </div>
    </div>
</div>
