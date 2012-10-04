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
                        <a href="#">Inbox</a>            
                    </li>
                    <li>
                        <a href="#">Announcements</a>        
                    </li>
                    <li>
                        <a href="#">Support</a>        
                    </li>
                    <li>
                        <input class="button" value="Sign Out" type="button" onclick="document.location.href='/backend.php/logout';" />
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>