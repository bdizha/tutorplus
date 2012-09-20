<ul>
    <?php foreach ($programmes as $program): ?>
        <li>
            <div class="program-image"><img src="/images/icons/14x14/programmes.png" alt="<?php echo $program["name"] ?>"></div>
            <div class="program-name"><?php echo $program["name"] ?></div>
        </li> 
    <?php endforeach; ?>      
</ul>
<div class="clear"></div>