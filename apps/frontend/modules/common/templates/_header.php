<?php $isAuthenticated = $sf_user->isAuthenticated() ?>
<div id="inner-header-wrapper">
    <div id="logo-container">
        <div id="logo-wrapper">
            <div id="logo"><a href="/"><img src="/images/logo.jpg"></img></a></div>
            <div id="header-links">                        
                <ul>
                    <?php if ($isAuthenticated): ?>
                        <?php $profile = $sf_user->getProfile(); ?>
                        <li id="header_link_photo">
                            <?php include_partial('personal_info/photo', array('profile' => $profile, "dimension" => 24, "cssClass" => "menu-photo")) ?>
                            <?php echo link_to($profile, 'profile_show', $profile) ?>
                        </li>
                        <li id="header_link_inbox">
                            <?php echo link_to2("Inbox", "message_inbox", array()) ?>
                            <span class="list-count"><?php echo $totalInboxCount ?></span>
                        </li>
                        <li id="header_link_notifications">
                            <?php echo link_to2("Notifications", "activity_feed", array()) ?>
                            <span class="list-count"><?php echo $totalNotificationCount ?></span>
                        </li>
                        <li id="header_link_sing_out">
                            <input class="button" value="Sign Out" type="button" onclick="document.location.href='<?php echo url_for('@profile_sign_out') ?>';" />
                        </li>
                    <?php else: ?>
                        <li id="header_link_sign_in">
                            <input class="button" value="Enroll as a Student!" type="button" onclick="document.location.href='<?php echo url_for('@profile_sign_in') ?>';"/>
                            <input class="button" value="Enroll as an Instructor!" type="button" onclick="document.location.href='<?php echo url_for('@profile_sign_in') ?>';"/>
                            <input class="button" value="Sign In" type="button" onclick="document.location.href='<?php echo url_for('@profile_sign_in') ?>';" />
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>