<?php use_helper('I18N', 'Date') ?>
<?php include_component('common', 'secureMenu', $helper->getLinks()) ?>
<?php include_partial('common/breadcrumbs', $helper->getBreadcrumbs("discussion_topic_new")) ?>
<?php include_partial('common/flashes_normal', array('form' => $form)) ?>
<div id="sf_admin_form_container">
    <div id="sf_admin_content">
        <?php include_partial('common/tabs', array('tabs' => $helper->getTabs($discussion, $myPeers, "new"))) ?>
        <div class="tab-block">
            <?php include_partial('discussion_topic/form', array('discussion_topic' => $discussion_topic, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
            <div id="sf_admin_footer">
                <?php include_partial('discussion_topic/form_footer', array('discussion_topic' => $discussion_topic, 'form' => $form, 'configuration' => $configuration)) ?>
            </div>
        </div>
    </div>
</div>