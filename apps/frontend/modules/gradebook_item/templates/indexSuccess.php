<?php use_helper('I18N', 'Date') ?>
<?php include_partial('gradebook_item/flashes') ?>
<?php include_partial('gradebook_item/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
<ul class="sf_admin_actions">
    <?php include_partial('gradebook_item/list_batch_actions', array('helper' => $helper)) ?>
    <?php include_partial('gradebook_item/list_actions', array('helper' => $helper)) ?>
</ul>
<div id="sf_admin_footer">
    <?php include_partial('gradebook_item/list_footer', array('pager' => $pager)) ?>
</div>