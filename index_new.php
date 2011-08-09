<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Your Page Title</title>
    <!-- add your meta tags here -->

    <link href="css/my_layout.css" rel="stylesheet" type="text/css" />
    <!--[if lte IE 7]>
    <link href="css/patches/patch_my_layout.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <?PHP
    include_once ("./cfg/config.inc.php");
    include_once ("./cfg/menu.cfg.php");
    include_once ("./cfg/lang.inc.php");
    include_once ("./lib/class.singleton.php");
    include_once ("./lib/class.session.php");
    error_reporting($g_error_reporting);
    include_once ("./lib/lib.inc.php");
    include_once ("./cfg/layout.inc.php");
    include_once ("./lib/class.menu.php");
    include_once ("./lib/class.lastmod.php");
    include_once ("./lib/class.InfoParsing.php");
    include_once ("./lib/class.doc.php");

    ?>

  </head>
  <body>
    <div class="page_margins">
      <div class="page">
        <div id="header">
          <div id="topnav">
            <!-- start: skip link navigation -->
            <a class="skip" title="skip link" href="#navigation">Skip to the navigation</a><span class="hideme">.</span>
            <a class="skip" title="skip link" href="#content">Skip to the content</a><span class="hideme">.</span>
            <!-- end: skip link navigation --><a href="#">Login</a> | <a href="#">Contact</a> | <a href="#">Imprint</a>
          </div>
        </div>
        <div id="nav">
          <!-- skiplink anchor: navigation -->
          <a id="navigation" name="navigation"></a>
          <div class="hlist">
            <!-- main navigation: horizontal list -->
            <ul>
              <li class="active"><strong>Button 1</strong></li>
              <li><a href="#">Button 2</a></li>
              <li><a href="#">Button 3</a></li>
              <li><a href="#">Button 4</a></li>
              <li><a href="#">Button 5</a></li>
            </ul>
          </div>
        </div>
        <div id="main">
          <div id="col1">
            <div id="col1_content" class="clearfix">
              <!-- add your content here -->
              <?PHP
$myMenu = new menu();
    $myMenu->setMenu($menutree_new);
    if (isset($_GET['pos'])) {
      if (!empty($_GET['pos'])) {
        $myMenu->pos_click = $_GET['pos'];
      }
    }
    if (isset($_GET['level']) && !empty($_GET['level'])) {
      $myMenu->level = $_GET['level'];
    } else {
      $myMenu->level_depth = 2;
    }
    $myMenu->setCSS($menu_class);
    $level = 1;
    $myMenu->printMenuAsDiv(null);              ?>
            </div>
          </div>
          <div id="col2">
            <div id="col2_content" class="clearfix">
              <!-- add your content here -->
            </div>
          </div>
          <div id="col3">
            <div id="col3_content" class="clearfix">
              <!-- add your content here -->
            </div>
            <!-- IE Column Clearing -->
            <div id="ie_clearing"> &#160; </div>
          </div>
        </div>
        <!-- begin: #footer -->
        <div id="footer">Layout based on <a href="http://www.yaml.de/">YAML</a>
        </div>
      </div>
    </div>
    <div id="hiddenlpsubmitdiv"></div><script>try{for(var lastpass_iter=0; lastpass_iter < document.forms.length; lastpass_iter++){ var lastpass_f = document.forms[lastpass_iter]; if(typeof(lastpass_f.lpsubmitorig2)=="undefined"){ lastpass_f.lpsubmitorig2 = lastpass_f.submit; lastpass_f.submit = function(){ var form=this; var customEvent = document.createEvent("Event"); customEvent.initEvent("lpCustomEvent", true, true); var d = document.getElementById("hiddenlpsubmitdiv"); for(var i = 0; i < document.forms.length; i++){ if(document.forms[i]==form){ d.innerText=i; } } d.dispatchEvent(customEvent); form.lpsubmitorig2(); } } }}catch(e){}</script>
  </body>
</html>