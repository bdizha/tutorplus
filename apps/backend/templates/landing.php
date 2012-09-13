<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
        <title>Tutorplus collaborative learning</title>
        <meta name="description" content="Tutorplus collaborative learning platform"/>
        <meta name="robots" content="follow" />
        <link rel="shortcut icon" href="/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="/css/elements.css" />
        <link rel="stylesheet" type="text/css" href="/css/tp.css" />
        <link rel="stylesheet" type="text/css" href="/css/left-menu.css" />
        <link rel="stylesheet" type="text/css" href="/css/top-menu.css" />
        <link rel="stylesheet" type="text/css" href="/css/course.css" />
        <link rel="stylesheet" type="text/css" href="/css/form.css" />
        <link href="/css/symfony.css" media="screen" type="text/css" rel="stylesheet" />
        <script src="/js/jquery-1.6.2.min.js" type="text/javascript"></script>
        <script src="/js/jquery.simplemodal.1.4.1.min.js" type="text/javascript"></script>
        <script src="/js/ecollegeplus.js" type="text/javascript"></script>
    </head>
    <body>
        <script type='text/javascript'>
            $(document).ready(function(){
                $("#container-wrapper").height(300);
                $("#main-header").height(95);
            });
        </script>
        <div id="ecollegeplus">
            <div id="header-big">
                <div id="top-header-big">
                    <div class="top-row">
                        <div id="logo-big"><a href="/" title="Home">TutorPlus</a></div>
                        <h2>A collaborative learning platform</h2>         
                        <div id="login-container">
                            <div id="login-container-inner">
                                <input class="cancel" id="login-btn" type="button" value="Log In"/>
                                <div id="login-box" style="display: none; ">
                                    <?php echo get_component('sfGuardAuth', "logInMini") ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bottom-row">
                        <p class="intro">
                            Welcome to TutorPlus - a novel platform where Higher Education learners brainstorm around their course activities with the support of their instructors and peers. It's surely an enhanced learning service specifically designed to compliment your on-campus life...
                        </p>
                        <div id="instructor-carousel">
                            <div id="instructor-carousel-inner">
                                <div class="small-image">
                                    <a href="http://gravatar.com/matt" target="_blank"><img src="//1.gravatar.com/avatar/767fc9c115a1b989744c755db47feb60?s=200&amp;r=pg&amp;d=mm" width="100" height="100"></a>
                                </div>
                                <div class="instructor-info">
                                    <h4>Batanayi Matuku</h4>
                                    <p class="instructor-position">Mcom Information Systems UCT</p>
                                    <div class="instructor-about">
                                        We're extremely proud to having developed the TutorPlus platform and we strongly believe learners and their instructors will find it enjoyable and complimentary to all of their learning activities.
                                    </div>
                                </div>
                                <div style="clear:both"></div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
            <div id="main-container">
                <div id="container-wrapper" style="display:block;">
                    <div id="left-panel">
                        <div class="panel-block">
                            <div class="drive-intro">
                                <img src="//ssl.gstatic.com/accounts/services/drive/drive.png" class="drive-graphic" alt="" />
                                <ul class="tutorplus-features">
                                    <li id="drive-access-everywhere">Share ideas and collaborate</li>
                                    <li id="drive-store-files">Setup discussion groups and seamlessly engage with your peers</li>
                                    <li id="drive-share">Stay motivated by your peers' view points</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php echo $sf_content ?>
                    <div class="clear"></div>
                </div>
            </div>
            <div id="main-footer">
                <div id="bottom-menu">
                    <div id="copyright">TutorPlus.org &copy; <?php echo date("Y") ?>. All rights reserved.</div>
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