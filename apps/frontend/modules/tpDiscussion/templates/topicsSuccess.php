<?php use_helper('I18N', 'Date') ?>
<?php include_component('tpCommon', 'secureMenu', $helper->getLinks()) ?>
<?php include_partial('tpCommon/breadcrumbs', $helper->getBreadcrumbs("discussion_topics", "Topics", "/discussion/" . $discussion->getSlug() . "/topics", $discussion)) ?>
<div id="sf_admin_content">
    <?php include_partial('tpCommon/flashes_normal') ?>
    <div class="content-block">
        <?php include_partial('tpCommon/tabs', array('tabs' => $helper->getShowTabs($discussion, "topics"))) ?>
        <div class="tab-block" id="my_peers">
            <?php include_partial('tpCommon/actions', array('actions' => $helper->getActions($discussion, $discussionPeer, $discussion->hasProfile($sf_user->getId())))) ?>
            <?php include_partial('tpDiscussionTopic/list', array('discussionTopics' => $discussion->getTopics(), 'helper' => $helper)) ?>
        </div>
    </div>
</div>