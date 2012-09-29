<div id="profile-left">
    <div id="profile-photo">
        <img src="/backend.php/profile_show_photo/<?php echo $sf_user->getId() ?>/96/<?php echo time() ?>" alt="Fox Matuku"/>
    </div>
</div>
<?php include_partial("profile/" . $profileType . "_info", array("profile" => $profile)) ?>
<div id="profile-right">
    
    <ul id="mini-correspondents">
        <?php $i = 0; ?>
        <?php foreach ($peers as $peer): ?>
            <li class="first">
                <img alt="<?php //echo $correspondence->getRelevantUser($sf_user->getId()) ?>" src="/backend.php/profile_show_photo/<?php echo $correspondence->getRelevantUser($sf_user->getId())->getId() ?>/36/<?php echo time() ?>"></img>                                      
            </li>
            <?php $i++; ?>
        <?php endforeach; ?>
    </ul>
</div>