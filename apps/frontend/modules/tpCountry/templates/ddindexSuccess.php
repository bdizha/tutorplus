<?php use_helper('I18N', 'Date') ?>
<?php include_partial('country/assets') ?>

<?php //print_r(sfConfig::get("app_popup_country")); die; ?>

<div id="sf_admin_container">
  <?php include_partial('country/flashes_normal') ?>
	<div class="sf_admin_heading">
  	<h3><?php echo __('Country List', array(), 'messages') ?></h3>
  </div>
  <!--<div id="sf_admin_header">
    <?php include_partial('country/list_header', array('pager' => $pager)) ?>
  </div>
-->  <!--
  <div id="sf_admin_bar">
    <?php include_partial('country/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>
  -->

  <div id="sf_admin_content">
    <form action="<?php echo url_for('country_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('country/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('country/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('country/list_actions', array('helper' => $helper)) ?>
    </ul>
    </form>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('country/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
