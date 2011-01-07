<html>
<head>
<title>Immobilien Kenzelmann Josef</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="./css/josi.css" media=screen rel=stylesheet type=text/css>
</head>
<body>
<?
//echo ">>>>Hallo".$men."-".$open."-"-$rubrik."<br>";
//echo "Rubrik: $_REQUEST[rubrik]<br>";
//echo "Menu: $_REQUEST[men]<br>";
//echo "open: $_REQUEST[open]<br>";
//echo "<pre>";
//print_r($GLOBALS);
//echo "</pre>";
//Diese Datei erzeugt mit Hilfe von der cfg/inhalt.cfg.php Datei die Menustruktur
include ("./cfg/menu.cfg.php");
//include("./cfg/adresse.cfg.php");
$font_start = "<font face='Arial' size='1'>";
$font_end   = "</font>";
//echo '<p><a href="index_deutsch.htm" target="Hauptframe"><img border="0" src="images/majesta_logoklein_home.jpg" width="103" height="41"></a></p>';
echo "<table cellpadding='0' cellspacing='1'>";
foreach ($menu as $mm => $sb1) {
	echo "<tr><td nowrap><b>&nbsp;</b></td></tr>";
	foreach($sb1 as $mm2 => $sb2){
		if ($_REQUEST[open] && preg_match("/$_REQUEST[men]/i",$mm2) && preg_match("/$rubrik/i",$mm)){
			echo "<tr><td class=men1><div class=m1><a href='$datei?open=0'>$mm2</a></div></td></tr>";
		}else{
			echo "<tr><td class=men1><div class=m1><a href='$datei?men=$mm2&rubrik=$mm&open=1'>$mm2</a></div></td></tr>";		
		}
			foreach($sb2 as $mm3 => $sb3){
				if (preg_match("/$_REQUEST[men]/i",$mm2) && preg_match("/$_REQUEST[rubrik]/i",$mm) && !empty($_REQUEST[men]) && !empty($_REQUEST[rubrik]) && !isset($close)) {
					$open=true;
					$m_arr = split(",", $sb3);
					if ($m_arr[0] == 1 && !empty($m_arr[2])){
						echo "<tr><td class=men2><div class=m2><a href='$m_arr[2]' target='$m_arr[1]'>&nbsp;&nbsp;&nbsp;&nbsp;$mm3</a></div></td></tr>";
					}
				}
			}
	}
}
echo "</table>";
echo "<br>".$font_start.$adresse.$font_end;
?>
</body>
</html>