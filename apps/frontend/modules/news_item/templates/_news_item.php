<?php use_helper('I18N', 'Date') ?>
<div class="news-item">
    <?php include_partial('personal_info/photo', array('user' => $newsItem->getUser(), "dimension" => 96)) ?>
    <div class="heading"><?php echo $newsItem->getHeading() ?></div>
    <div class="body"><?php echo $newsItem->getBody() ?></div>
    <div class="user_meta">By <?php echo link_to($newsItem->getUser(), 'profile_show', $newsItem->getUser()) ?> - <span class="datetime"><?php echo myToolkit::dateInWords($newsItem->getUpdatedAt()) ?></span></div>
    <?php if ($newsItem->getUserId() == $sf_user->getId()): ?>
        <div class="inline-content-actions">
            <?php echo $helper->linkToNewsItemEdit($newsItem, array()) ?>
            <?php echo $helper->linkToNewsItemDelete($newsItem, array("confirm" => "Are you sure?")) ?>
        </div>
    <?php endif; ?>
</div>