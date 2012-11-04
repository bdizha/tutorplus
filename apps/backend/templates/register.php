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
                    <?php include_component('common', 'header') ?>
                    <div id="main-menu">
                        <?php include_slot('menu') ?>
                    </div>                 
                </div>
            </div>
            <div id="main-container" class="register-container">
                <div id="main-container-wrapper" class="register-container-wrapper">
                    <?php echo $sf_content ?>
                </div>
                <div class="clear"></div>
                <div id="color-box-modal" style="display:none">&nbsp;</div>
            </div>
            <div id="main-footer">
                <?php include_partial('common/footer') ?>
            </div>
        </div>        
    </body>
</html>