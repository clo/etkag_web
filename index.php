<?PHP
$id=session_start();
?>
<html>
<head>
<title><?PHPecho $pagetitle?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="description" content="ETK AG Elektro-Tableau Kalbermatter AG Schaltanlagen und Automation Naters">
<meta name="keywords" content="ETK AG Elekrto-Tableau Kalbermatter AG Schaltanlagen Automation Elektro Kasten Naters Automation Geb�udeautomation Brennstempel Energieverteilung Hausverteilung Verteilung Haustechnik Industrie Strassentunnel Spezialanlagen Baufirma Musterdisposition Elektrobrennstempel Wallis Schweiz">

<LINK href="./css/etkag.css" media=screen rel=stylesheet type=text/css>
</head>
<body bgcolor="#DDDDDD">
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


//session
$s= singleton::getInstance("session");
$s->setSessionID($id);
$s->setUsername($cfg_username);
$s->setPassword($cfg_password);
//$s->start();

echo "<table width='900' height='100%' bgcolor='#002740' border='0' cellpadding='1' cellspacing='0' align='center' valign='top'>";
//top
echo "<tr height='$top_height' ><td colspan=2>";
include("top.php");
echo "</td></tr>";
/*
 * MENU
 */
echo "<tr><td bgcolor='$menu_color_bg' valign='$menu_v' align='left'>";
echo "<table width='200' border='0' valign='top' class=menu height=100% cellpadding='0' cellspacing=1>\n";
$myMenu = new menu();
$myMenu->setMenu($menutree_new);
if (!empty($_GET[pos])){
  $myMenu->pos_click = $_GET[pos];
}
if (!empty($_GET[level])){
  $myMenu->level = $_GET[level];
}else{
  $myMenu->level_depth = 2;
}
$myMenu->setCSS($menu_class);
$level = 1;
$myMenu->printMenu(null);	

//Adresse
//echo "<table class=menuadresse border=1 valign='bottom' height='100%'>";
echo "<tr><td class=menuadresse>";
echo $contactaddress;
echo "</td></tr>";
echo "</table>";

/*
 * MAIN
 */
echo "</td><td width='900' height='$middle_height' valign='top'>";
//include_once("location.php"); 
//iframe
$param = buildParam($_GET,'start');
if (empty($_GET[site])){
  echo "<iframe src='main.php' height='100%' frameborder=0 width='700'>";
  echo "</iframe>";	
}else{
  if (is_file($_GET[site].".php")){
    echo "<iframe src='".$_GET[site].".php".$param."' height='100%' frameborder='0' width='700'>";
    echo "</iframe>";
  }else{
    echo "<p class='error'>".getErrMsg(1)."</p>";
  }
}
//object
/*if (empty($site)){
  include("main.php");
}else{
  if (is_file($site.".php")){
    echo "<object data='".$site.".php' type='text/html' objectborder=0 height='100%' width='600'>";
    echo "</object>";
  }else{
    echo "<p class='error'>".getErrMsg(1)."</p>";
  }
}*/
echo "</td></tr>";
//bottom
echo "<tr height='$bottom_height'><td colspan=2>";
include("bottom.php");
echo "</td></tr>";
echo "</table>";
?>
</body>
</html>