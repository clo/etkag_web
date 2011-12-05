<?PHP
//if (!session_id()) {
  session_start();
//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";
//}
//include("cfg/config.inc.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="de" xml:lang="de">

  <head>
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <!--meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1" /-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="css/etkag.css" media="screen" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/etkag.js"></script>

    <!-- RSS autodiscovery -->
    <link rel="alternate" type="application/rss+xml" title="RSS News"
          href="http://localhost/etkag/rss.php?channel=news" />
    <link rel="alternate" type="application/rss+xml" title="RSS Anl&auml;sse"
          href="http://localhost/etkag/rss.php?channel=anlaesse" />
    <link rel="alternate" type="application/rss+xml" title="RSS Motto"
          href="http://localhost/etkag/rss.php?channel=jahresmotto" />
    <!-- Google Analytics -->
    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-23989566-1']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>

    <?PHP
    set_include_path("lib;" . get_include_path());
    include_once ("./cfg/config.inc.php");
    include_once ("./cfg/menu.cfg.php");
    include_once ("./cfg/lang.inc.php");
    include_once ("./lib/class.singleton.php");
    include_once ("./lib/class.session.php");
    error_reporting($g_error_reporting);
    if ($g_debug) { echo "SESSIONID: ".session_id(); }

    /*
     * session handling
     */
    $s = singleton::getInstance("session");
    if ((isset($_POST['abmelden']) && $_POST['abmelden'] == 'abmelden') ||
            empty($_SESSION['loggedin'])) {
      unset($_SESSION['loggedin']);
      unset($_SESSION['username']);
    }
    if (isset($_POST['anmelden']) && $_POST['anmelden'] == 'anmelden') {
      if ($s->check()) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $_POST['user'];
      }
    }
    ?>
    <title><?PHP echo $pagetitle ?></title>

    <!-- used for lytebox -->
    <!--script type="text/javascript" src="lib/lytebox/lytebox.js"></script>
    <link rel="stylesheet" href="lib/lytebox/lytebox.css" type="text/css" media="screen" /-->

    <!-- jquery lightbox plugin -->
    <!--script type="text/javascript" src="lib/jquery-lightbox-0.5/js/jquery.js"></script>
    <script type="text/javascript" src="lib/jquery-lightbox-0.5/js/jquery.lightbox-0.5.js"></script>
    <link rel="stylesheet" type="text/css" href="lib/jquery-lightbox-0.5/css/jquery.lightbox-0.5.css" media="screen" />

    <script type="text/javascript">
      $(function() {
        $('a[@rel*=lightbox]').lightBox(); // Select all links that contains lightbox in the attribute rel
      });
    </script-->
    
    <!-- MediaBox -->
    
    <link rel="stylesheet" href="lib/mediabox/css/mediaboxAdvBlack21.css" type="text/css" media="screen" />
    <script src="lib/mediabox/js/mootools-1.2.5-core-nc.js" type="text/javascript"></script>
    <script src="lib/mediabox/js/mediaboxAdv-1.3.4b.js" type="text/javascript"></script>

    <!--
      Metadata
    -->
    <!--meta http-equiv="Content-Type" content="text/html; charset=utf-8" /-->
    <!--meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" /-->
    <meta name="description" content="ETK AG Elektro-Tableau Kalbermatter AG Schaltanlagen und Automation Naters" />
    <meta name="keywords" content="ETK AG Elekrto-Tableau Kalbermatter AG Schaltanlagen Automation Elektro Kasten Naters Automation Geb&auml;udeautomation Brennstempel Energieverteilung Hausverteilung Verteilung Haustechnik Industrie Strassentunnel Spezialanlagen Baufirma Musterdisposition Elektrobrennstempel Wallis Schweiz" />

  </head>
  <body>
    <?PHP
    include_once ("./lib/lib.inc.php");
    include_once ("./cfg/layout.inc.php");
    include_once ("./lib/class.menu.php");
    include_once ("./lib/class.lastmod.php");
    include_once ("./lib/class.InfoParsing.php");
    include_once ("./lib/class.doc.php");
    if (!isset($_SESSION['site'][$_GET['site']])){
      $myDoc = new doc();
      $myDoc->myrscandir($g_content);
    }

    ?>