<?PHP
include("header.php");
$dir="doc/organigramm";
$myDoc = new doc($dir);
$val = $myDoc->getDetailInformation($dir,"^id=".$_GET['id']);

echo "<h3>".$val['titel']."</h3>";

echo "<div align='left'>";
echo "<table border=0 class=cv>";
foreach($val as $k => $v){
  if(preg_match("/detail_/",$k)){
    $key = ucfirst(str_replace("detail_","",$k));
    if(preg_match("/Email/",$key)){
      $v = "<a class='main' href='mailto:$v'>$v</a>";
    }
  	echo "<tr><td>$key:&nbsp;</td><td>$v</td></tr>";
  }
}

$pic = $myDoc->getFileTypeSymbol('pdf');
echo "<tr><td colspan='2'>$pic&nbsp;<a class='main' href='".$val['lebenslauf']."' target='_new'>Lebenslauf</a></td></tr>";
echo "<tr><td colspan='2'><a class='main' href='' onClick='javascript:history.back();'>>zur�ck<</a></td></tr>";
echo "</table>";
echo "</div>";

include("footer.php");
?>