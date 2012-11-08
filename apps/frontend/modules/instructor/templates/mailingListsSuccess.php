<ul>
    <?php foreach ($mailing_lists_list as $mailing_list): ?>
        <li>
            <div class="program-image">
                <img src="/images/icons/14x14/mailing_lists.png" alt="<?php echo $mailing_list["name"] ?>"></img>
            </div>
            <div class="program-name">
                <?php echo $mailing_list["name"] ?>
            </div>
        </li> 
    <?php endforeach; ?>      
</ul>
<div class="clear"></div>