<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head> 	
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
    <title>TutorPlus - lifelong learning</title>
    <meta name="description" content="TutorPlus - lifelong learning"/>
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
      <div id="main-container">
        <div id="main-header">
          <div class="wrapper">
            <div id="main-logo">
              <a href="/" title="">TutorPlus.org</a>
            </div>
            <div id="main-menu">
              <?php include_slot('main-menu') ?>
            </div>                 
          </div>
        </div>
        <div id="main-body">
          <?php include_slot('notice') ?>
          <div class="wrapper">
            <div id="left-column">
              <?php include_slot('left-column') ?>              
            </div>
            <div id="middle-column">
              <?php echo $sf_content ?>
            </div>
          </div>
        </div>
        <div id="main-footer">
          <?php include_partial('common/footer') ?>
        </div>
      </div> 
    </div>          
  </body>
</html>