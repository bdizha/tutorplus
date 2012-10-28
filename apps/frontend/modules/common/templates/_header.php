<?php $isAuthenticated = $sf_user->isAuthenticated() ?>
<div id="inner-header-wrapper">
    <div id="logo-container">
        <div id="logo-wrapper">
            <div id="logo">                
                <a href="/"><img src="/images/logo.png"></img></a>
            </div>
            <div id="header-links">                        
                <ul>
                    <li id="header_link_support">
                        <a href="#">You need technical support?</a>        
                    </li>
                    <li id="header_link_sign_in">
                        <?php if ($isAuthenticated): ?>
                            <input class="button" value="Dashboard" type="button" onclick="document.location.href='/backend.php/dashboard';" />
                        <?php else: ?>
                            <input class="button" value="Sign In" type="button" onclick="document.location.href='/backend.php/user/login';" />
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>