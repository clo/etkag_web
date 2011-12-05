<h3 class="contenttitle">Referenzen <?PHP echo replaceUmlaut(ucwords($_GET['dir'])); ?> </h3><br />
<?PHP
$myDoc = new doc();
$dir = $_SESSION['site'][$_GET['dir']];
$myDoc->path=$dir."/referenzen";
$dir_arr = $myDoc->getFolders($myDoc->path,true);
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
    $info_arr = $myDoc->getInfoText($myDoc->path."/".$dir);
    $foto = $myDoc->docAvailable($myDoc->path."/$dir/foto",".*jpg$|.*JPG$");
    $doc = $myDoc->docAvailable($myDoc->path."/$dir/dokument","pdf$");
    unset($_GET['dir']);
    $param = buildParam($_GET,'start');
    echo "<tr $bgcol>";
    echo "<td>".$myDoc->insertUmlaut($myDoc->formatLinkName($dir,false,true,false))."</td>";
    echo "<td align='left'>".$myDoc->insertUmlaut($info_arr['kunde'])."&nbsp;</td>";
    echo "<td align='center' nowrap>".$info_arr['datum']."&nbsp;</td>";
    if ($doc){
      echo "<td align=center><a class=main href='index.php?site=dokumente&dir=".$myDoc->path."/$dir/dokument&kom=".$dir."&w=dok&param=$param' target='_top'><img src='img/pdf.png' border=0></a></td>";
    }else{
      echo "<td>&nbsp;</td>";
    } 
    if ($foto){
      echo "<td width=50 align=center><a class=main href='index.php?site=dokumente&dir=".$myDoc->path."/$dir/foto&kom=".$dir."&w=fot&param=$param' target='_top'><img src='img/camera.png' border=0></a></td>";
    }else{
      echo "<td width=50>&nbsp;</td>";
    }
    echo "</tr>";
    if(!empty($info_arr['bemerkung'])){
      echo "<tr $bgcol><td colspan=5 style='font-style: italic;'>&nbsp;&nbsp;".$myDoc->insertUmlaut($info_arr['bemerkung'])."</td></tr>";
    }
    $i++;
  }
}else{
  echo "<p>";
  echo getErrMsg(2);
  echo "</p>";
}
echo "</table>";
echo "<p>&nbsp;<a class=main href='javascript:history.back(-1);'>$g_backbutton</a></p>";

?>
