<?php use_helper('I18N', 'Date') ?>
<?php include_partial('gradebook_scale/flashes') ?>
<?php include_partial('gradebook_scale/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
<ul class="sf_admin_actions">
    <?php include_partial('gradebook_scale/list_batch_actions', array('helper' => $helper)) ?>
    <?php include_partial('gradebook_scale/list_actions', array('helper' => $helper)) ?>
</ul>
<div id="sf_admin_footer">
    <?php include_partial('gradebook_scale/list_footer', array('pager' => $pager)) ?>
</div>