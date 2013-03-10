<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->getEditLinks($discussion)) ?>
<?php include_partial('common/breadcrumbs', $helper->getEditBreadcrumbs($discussion)) ?>
<?php include_partial('common/flashes_normal', array('form' => $form)) ?>
<div id="sf_admin_form_container">
    <div id="sf_admin_content">
        <div class="content-block">
            <?php include_partial('common/tabs', array('tabs' => $helper->getTabs($myDiscussions, $exploreDiscussions, "edit", $discussion))) ?>
            <div class="tab-block">
                <?php include_partial('discussion/form', array('discussion' => $discussion, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
                <div id="sf_admin_footer">
                    <?php include_partial('discussion/form_footer', array('discussion' => $discussion, 'form' => $form, 'configuration' => $configuration)) ?>
                </div>
            </div>
        </div>
    </div>
</div>