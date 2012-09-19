<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head> 	
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
        <title>Tutorplus collaborative learning platform</title>
        <meta name="description" content="Tutorplus collaborative learning platform"/>
        <meta name="robots" content="follow" />
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
    </head>
    <body>
        <div id="tutorplus">
            <div id="main-header">
                <div id="header-wrapper">   
                    <div id="inner-header-landing-wrapper">
                        <div id="logo-container">
                            <div id="logo-wrapper">
                                <div id="header-links">                        
                                    <ul>
                                        <li>
                                            <a href="#">You need technical support?</a>        
                                        </li>
                                        <li>
                                            <input class="button" value="Login" type="button" onclick="document.location.href='/backend.php/login';" />
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>            
                </div>
            </div>
            <div id="main-container">
                <div id="main-container-wrapper">
                    <div id="inner-container-wrapper">
                        <div id="middle-landing-column">
                            <?php echo $sf_content ?>
                        </div>                        
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div id="main-footer">
                <div id="bottom-menu">
                    <div id="copyright">TutorPlus.org &copy; <?php echo date("Y") ?>. All rights reserved.</div>
                    <div id="footer-links">
                        <ul>
                            <li><a href="http://tutorplus.org/support" class="first" target="_blank">Support</a></li>
                            <li><a href="http://tutorplus.org/terms" target="_blank">Terms of service</a></li>
                            <li><a href="http://tutorplus.org/privacy-policy" target="_blank">Privacy policy</a></li>
                            <li><a href="http://www.facebook.com/tutorplus" target="_blank">Facebook</a></li>
                            <li><a href="http://www.twitter.com/tutorplus" target="_blank">Twitter</a></li>
                        </ul>                        
                    </div>
                    <div id="ownership">Powered by <a target="_blank" href="http://www.graphifox.com">www.graphifox.com</a></div>
                </div>
            </div>
        </div>        
    </body>
</html>