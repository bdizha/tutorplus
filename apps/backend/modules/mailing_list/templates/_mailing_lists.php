<ul>
    <?php foreach ($mailingLists as $mailingList): ?>
        <li>
            <div class="mailing-list-image"><img src="/images/icons/14x14/mailing_lists.png" alt="<?php echo $mailingList["name"] ?>"/></div>
            <div class="mailing-list-name"><?php echo $mailingList["name"] ?></div>
        </li> 
    <?php endforeach; ?>      
</ul>
<div class="clear"></div>