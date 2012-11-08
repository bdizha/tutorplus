<?php use_helper('I18N', 'Date') ?>
<?php include_partial('contact/assets') ?>
<?php include_partial('contact/flashes') ?>

<?php include_partial('contact/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>	
<ul class="sf_admin_actions">
    <?php include_partial('contact/list_batch_actions', array('helper' => $helper)) ?>
    <?php include_partial('contact/list_actions', array('helper' => $helper)) ?>
</ul>