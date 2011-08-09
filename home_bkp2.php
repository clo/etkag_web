<?PHP
include("header_nocache.php");
?>
<table class="content"><tr>
<td class='homeleft'>
<h3 class='hometitle'>Herzlich Willkommen bei ETK AG</h3>
<?PHP 
echo $startseite;
echo "<img class='etkag' src='fotos/mitarbeiter_lustig.jpg' border=0>";
?>
<p class='pictext'>Mitarbeiter ETK AG</p>
</td>
<td class="homeright">
<?PHP
/*
 * Section on the right hand site
 */
$dir="doc/aktuelle_objekte";
$myDoc = new doc($dir);
$info_arr = $myDoc->getInfoText($dir,null,'MULTIPLE');
//$myDoc->dump($info_arr);
if (!empty($info_arr)){
  echo "<h3 class='hometitle'>Atkuelle Objekte</h3>";
  echo "Die ETK AG dankt Ihnen f&uuml;r das Vertrauen.<br><br>";
  //echo "<table class='topnews'>";
  echo "<span class='homeright'>";
  foreach($info_arr as $k => $val){
  	if (compDate($info_arr[$k]['endtermin']) == 1 || compDate($info_arr[$k]['endtermin']) == 0){
  	  foreach($val as $key => $v){
  	    if ($v != ''){
  	       echo "<b>".ucfirst($key)."</b>:" . $v . "<br />";
  	    }
  	  }
  	}
  }
  echo "</span>";
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
  echo "<h  class='hometitle'>Letzten News:</h3>";
  //echo "<table width='300' border=0>";
  echo "<span class='homeright'>";
  for($i=0;$i<1;$i++){
    if ($myDoc->getDate($info_arr[$key]) >= date('%d.%m.%Y')){
      $linkname = $myDoc->formatLinkName($info_arr[$key],true,true,false,null,false,false);
      echo $myDoc->getDate($info_arr[$key]).":&nbsp;<br>".$linkname;
    }	
  }
  echo "</span>";
  echo "<a class='main' href='news.php'>alle News</a>";
}
?>
</td>
</tr></table>
</div>