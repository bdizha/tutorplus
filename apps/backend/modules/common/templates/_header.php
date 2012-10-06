<?php $user = $sf_user->getGuardUser()->getProfile()->getUser(); ?>
<div id="inner-header-wrapper">
    <div id="logo-container">
        <div id="logo-wrapper">
            <div id="header-links">                        
                <ul>
                    <li>
                        <?php include_partial('personal_info/photo', array('user' => $user, "dimension" => 24, "cssClass" => "menu-photo")) ?>
                        <?php echo link_to($user, 'profile_show', $user) ?>
                    </li>
                    <li>
                        <?php echo link_to2("Inbox", "message_inbox", array()) ?>
                        <span class="list-count">4</span>
                    </li>
                    <li>
                        <?php echo link_to2("Notifications", "activity_feed", array()) ?>
                        <span class="list-count">26</span>
                    </li>
                    <li>
                        <input class="button" value="Sign Out" type="button" onclick="document.location.href='/backend.php/logout';" />
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>