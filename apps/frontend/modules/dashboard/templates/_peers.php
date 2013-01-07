<?php foreach ($myPeers as $myPeer): ?>
    <div class="my-peer"> 
        <?php include_partial('personal_info/photo', array('profile' => $myPeer, "dimension" => 36)) ?>
    </div>
<?php endforeach; ?>