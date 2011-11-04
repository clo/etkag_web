<?PHP
include("header.php");
?>
<h3 class="contenttitle">Gesch&auml;ftsdokumentation</h3>
<?PHP
//$myDoc = new doc();
//$pattern="/".$_GET[site]."$/";
//$myDoc->find_dir($g_content,$pattern,$base);
//unset($myDoc);
$base = $_SESSION['site'][$_GET['site']];

$myDoc = new doc($base);
$dir_arr = $myDoc->getFiles();
natsort($dir_arr);
if (!empty($dir_arr)){
  echo "<table class='conten'>";
  
  foreach ($dir_arr as $key => $file) {
    $info_arr = array();
    echo "<tr>";
    echo "<td class='contentleft'>";
    $linkname = $myDoc->formatLinkName($file,false,true,"","",false,true);
    $pic = $myDoc->getFileTypeSymbol($myDoc->getFileType($file));
    echo "$pic&nbsp;<a class=main href='".$base."/$file' onClick=\"javascript:window.open(this.href,'_self','menubar=no, width=800, height=600, resizable=yes');return false;\" target='_new'>$linkname</a></td>";
    echo "</tr>";
  }
}else{
  echo "<p>";
  echo getErrMsg(4);
  echo "</p>";
}
echo "</table>";

?>