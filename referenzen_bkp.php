<?PHP
include("header.php");
?>
<h3>Referenzen <?PHP echo replaceUmlaut(ucwords($_GET['dir'])); ?> </h3>
<?PHP
$base="doc/referenzen/".$_GET['dir'];
$myDoc = new doc($base);
$dir_arr = $myDoc->getFolders();
//	$myDoc->dump($dir_arr);
if (!empty($dir_arr)){
  echo "<table class=content border='0' cellspacing='0' cellpadding='2'>";
  echo "<tr><td width=275 align='left'><b>Komission</b></td>";
  echo "<td width=175 align='left'><b>Kunde</b></td>";
  echo "<td width=50 align='center'><b>Datum</b></td>";
  echo "<td width=50 align='center'><b>Doku</b></td>";
  echo "<td width=50 align='center'><b>Fotos</b></td></tr>";
  $i = 1;
  foreach ($dir_arr as $key => $dir) {
    $bgcol = '';
    if ($i%2){
      $bgcol = "bgcolor='#DDDDDD'";
    }
    $info_arr = array();
    $info_arr = $myDoc->getInfoText($base."/".$dir);
    $foto = $myDoc->docAvailable($base."/".$dir."/foto","etkag_.*jpg$");
    $doc = $myDoc->docAvailable($base."/".$dir."/dokument","pdf$");
    unset($_GET['dir']);
    $param = buildParam($_GET,'start');
    echo "<tr $bgcol>";
    echo "<td>".$myDoc->formatLinkName($dir,false,true,false)."</td>";
    echo "<td align='left'>".$info_arr['kunde']."&nbsp;</td>";
    echo "<td align='center' nowrap>".$info_arr['datum']."&nbsp;</td>";
    if ($doc){
      echo "<td align=center><a class=main href='index.php?site=dokumente&dir=".$base."/".$dir."/dokument&kom=".$dir."&w=dok&param=$param' target='_top'><img src='img/pdf.png' border=0></a></td>";
    }else{
      echo "<td>&nbsp;</td>";
    } 
    if ($foto){
      echo "<td width=50 align=center><a class=main href='index.php?site=dokumente&dir=".$base."/".$dir."/foto&kom=".$dir."&w=fot&param=$param' target='_top'><img src='img/camera.png' border=0></a></td>";
    }else{
      echo "<td width=50>&nbsp;</td>";
    }
    echo "</tr>";
    if(!empty($info_arr['bemerkung'])){
      echo "<tr $bgcol><td colspan=5 style='font-style: italic;'>&nbsp;&nbsp;".$info_arr['bemerkung']."</td></tr>";
    }
    $i++;
  }
}else{
  echo "<p>";
  echo getErrMsg(2);
  echo "</p>";
}
echo "</table>";
?>
<?PHP
include("footer.php");
?>
