<div id="inner-header-wrapper">
    <div id="logo-container">
        <div id="logo-wrapper">
            <div id="header-links">                        
                <ul>
                    <?php if($sf_user->getId()): ?>
                    <?php $user = $sf_user->getGuardUser()->getProfile()->getUser(); ?>
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
                    <?php else: ?>
                    <li>
                                            <a href="#">You need technical support?</a>        
                                        </li>
                                        <li>
                                            <input class="button" value="Sign In" type="button" onclick="document.location.href='/backend.php/login';" />
                                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>