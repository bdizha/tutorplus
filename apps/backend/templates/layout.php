<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head> 	
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
        <title>ecollege+ Collaborative learning platform</title>
        <meta name="description" content="eCollege+ Collaborative learning platform"/>
        <meta name="robots" content="follow" />
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
    </head>
    <body>
        <div id="ecollegeplus">
            <div id="header-small">
                <div id="header-wrapper">   
                    <div id="top-header-small">
                        <div id="logo-small"></div>
                        <div id="quick-settings">                        
                            <ul>
                                <li>
                                    <a href="#">My Profile</a>    
                                </li>
                                <li>
                                    <a href="#">Inbox</a>            
                                </li>
                                <li>
                                    <a href="#">Announcements</a>        
                                </li>
                                <li>
                                    <a href="#">Help</a>        
                                </li>
                                <li>
                                    <a href="#">Fox Matuku</a>    
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="main-menu">
                        <?php include_slot('nav_horizontal') ?>
                    </div>                 
                </div>
            </div>
            <div id="main-container">
                <div id="main-container-wrapper">
                    <?php include_slot('nav_vertical') ?>
                    <?php include_slot('nav_vertical_bottom') ?>
                    <div id="middle-column">
                        <?php include_slot('breadcrumbs') ?>
                        <div id="sf_admin_container">
                            <?php echo $sf_content ?>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
                <div id="color-box-modal" style="display:none">&nbsp;</div>
            </div>            
            <div id="simple-modal" class="hide">
                <div id="modal-title" class="modal-title"></div>
                <div id="modal-body" class="modal-body"></div>
            </div>
            <div id="main-footer">
                <div id="bottom-menu">
                    <div id="copyright">eCollegePlus.com &copy; <?php echo date("Y") ?>. All rights reserved.</div>
                    <div id="footer-links">
                        <ul>
                            <li><a href="http://www.ecollegeplus/support" class="first" target="_blank">Support</a></li>
                            <li><a href="http://www.ecollegeplus/terms" target="_blank">Terms of service</a></li>
                            <li><a href="http://www.ecollegeplus/privacy-policy" target="_blank">Privacy policy</a></li>
                            <li><a href="http://www.facebook.com/ecollegeplus" target="_blank">Facebook</a></li>
                            <li><a href="http://www.twitter.com/ecollegeplus" target="_blank">Twitter</a></li>
                        </ul>                        
                    </div>
                    <div id="ownership">Powered by <a target="_blank" href="http://www.graphifox.com">www.graphifox.com</a></div>
                </div>
            </div>
        </div>        
    </body>
</html>