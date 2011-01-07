<?
include("header_nocache.php");
?>
<table class='home'>
<tr><td colspan='2'>
<h3>Herzlich Willkommen bei ETK AG</h3></td>
<tr><td width='400'>
<p class='home'>Der zweitbeste Moment uns herauszufordern ist jetzt.<br>
Der beste Moment ist vorbei.<br>
Wir freuen uns auf Ihre Herausforderung.<br><br></p>
<?
echo "<img src='img.php?file=./fotos/mitarbeiter_lustig_500px.jpg&picWidth=300' border=0>";
?>
<!--<img src="./fotos/mitarbeiter_lustig_500px.jpg">-->
<p class='pictext'>Mitarbeiter ETK AG</p>
<!--<a class=main href="./index.php?site=iso">> ISO-Zertifizierung <</a>-->
</td><td width='300'>
<?
$dir="doc/aktuelle_objekte";
$myDoc = new doc($dir);
$info_arr = $myDoc->getInfoText($dir,null,'MULTIPLE');
//$myDoc->dump($info_arr);
if (!empty($info_arr)){
  echo "<h4>Atkuelle Objekte</h4>";
  echo "Die ETK AG dankt Ihnen für das Vertrauen.<br><br>";
  echo "<table class='topnews'>";
  foreach($info_arr as $k => $val){
  	if (compDate($info_arr[$k]['endtermin']) == 1 || compDate($info_arr[$k]['endtermin']) == 0){
  	  foreach($val as $key => $v){
  	    if ($v != ''){
  	      echo "<tr><td valign='top'><b>".ucfirst($key).":</b></td><td>$v</td></tr>";
  	    }
  	  }
  	  echo "<tr><td colspan=2 height='10'></td></tr>";
  	}
  }
  echo "</table>";
  /*echo "<table border=0>";
  echo "<tr>";
  echo "<td align='left' nowrap><b>Kunde&nbsp;</b></td>";
  echo "<td align='left' nowrap><b>Datum&nbsp;</b></td>";
  echo "<td align='left' nowrap><b>Bemerkung&nbsp;</b></td>";
  echo "</tr><tr>";
  echo "<td align='left' nowrap>".$info_arr['kunde']."&nbsp;</td>";
  echo "<td align='left' nowrap>".$info_arr['datum']."&nbsp;</td>";
  echo "<td align='left' nowrap>".$info_arr['bemerkung']."&nbsp;</td>";
  echo "</tr></table>";*/
}
$dir="doc/news";
$myDoc = new doc($dir);
$info_arr = $myDoc->getFoldersWithDate($dir,true);
//var_dump($info_arr);
$key = key($info_arr);  	
if (!empty($info_arr)){
  echo "<h4>Letzte News</h4>";
  echo "<table width='300' border=0>";
  for($i=0;$i<1;$i++){
    if ($myDoc->getDate($info_arr[$key]) >= date('%d.%m.%Y')){
      $linkname = $myDoc->formatLinkName($info_arr[$key],true,true,false,null,false,false);
      echo "<tr><td>".$myDoc->getDate($info_arr[$key]).":&nbsp;<br>".$linkname."</td></tr>";
    }	
  }
  echo "</table><br>";
  echo "<a class='main' href='news.php'>alle News</a>";
}
?>
</td></tr>
</table>
<?
include("footer.php");
?>
