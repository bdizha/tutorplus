<?php foreach ($peers as $peer): ?>
  <?php include_partial('personal_info/photo', array('profile' => $peer, "dimension" => 36)) ?>
<?php endforeach; ?>