<?PHP
$dir = $_SESSION['site']['unserteam'];
$myDoc = new doc($dir);
$val = $myDoc->getDetailInformation($dir,"^id=".$_GET['id']);

echo "<h3 class='contenttitle'>".$val['titel']."</h3>";

echo "<div align='left'>";
echo "<table border='0' class='cv' width='700'>";
$showPicture = true;
foreach($val as $k => $v){
  if(preg_match("/detail_/",$k)){
    $key = ucfirst(str_replace("detail_","",$k));
    if(preg_match("/Email/",$key)){
      $v = "<a class='main' href='mailto:$v'>$v</a>";
    }
  	echo "<tr><td><b>$key:</b>&nbsp;</td><td>$v</td>";
    if ($showPicture){
      $file=$_GET['dir']."/".$_GET['toppic'];
      echo "<td rowspan='".count($val)."'><a href='$file' $g_lytebox><img class='etkag' width='200' src='$file' border='0' title='".$val['vorname']."'></a></td>";
      $showPicture = false;
    }
    echo "</tr>\n";
  }
}

$pic = $myDoc->getFileTypeSymbol('pdf');
echo "<tr><td colspan='2'>$pic&nbsp;<a class='main' href='".$val['lebenslauf']."' target='_new'>Lebenslauf</a></td></tr>";
echo "<tr><td colspan='2'><a class='main' href=\"index.php?site=unserteam&pos=".$_GET['pos']."&level=\">$g_backbutton</a></td></tr>";
echo "</table>";
echo "</div>";

?>