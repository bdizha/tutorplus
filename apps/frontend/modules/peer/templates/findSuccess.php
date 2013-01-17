<?php use_helper('I18N', 'Date') ?>
<?php include_partial('common/breadcrumbs', $helper->findBreadcrumbs()) ?>
<?php include_component('common', 'secureMenu', $helper->findLinks()) ?>
<div id="sf_admin_content">
  <div class="content-block">
    <ul class="nav-tabs">
      <li class="active-tab">
        <a href="#" tab="potential_peers" class="tab-title">Find Peers</a>
        <span class="list-count"><?php echo count($potentialPeers) ?></span>
      </li>
    </ul>
    <div class="peer-block  padding-10" id="my_peers">
      <?php if (count($potentialPeers) == 0): ?>
        <div class="tip">Oops, there's not any peers available on this platform yet :)</div>
      <?php else: ?> 
        <?php include_partial('peer/list', array("peers" => $potentialPeers, "isFinding" => true)) ?>
      </div> 
    <?php endif; ?>
  </div>
</div>