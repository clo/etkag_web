<html>
<head>
<title><?PHP echo $pagetitle?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<LINK href="./css/etkag.css" media=screen rel=stylesheet type=text/css>
<!-- used for lightbox2, http://www.huddletogether.com/projects/lightbox2/ -->
<link rel="stylesheet" href="lib/lightbox/css/lightbox.css" type="text/css" media="screen" />
<script type="text/javascript" src="lib/lightbox/js/prototype.js"></script>
<script type="text/javascript" src="lib/lightbox/js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="lib/lightbox/js/lightbox.js"></script>

</head>
<body bgcolor="#FFFFFF">
<?PHP
include_once ("./lib/menu.cfg.php");
include_once ("./cfg/lang.inc.php");
include_once ("./lib/lib.inc.php");
include_once ("./cfg/layout.inc.php");
include_once ("./cfg/config.inc.php");
include_once ("./lib/class.menu.php");
include_once ("./lib/class.lastmod.php");
include_once ("./lib/class.doc.php");
include_once ("./lib/class.singleton.php");
include_once ("./lib/class.session.php");
?>