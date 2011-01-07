<?PHP
include("header.php");
?>
<h3>Gesch�ftsdokumentation</h3>
<?PHP
$base="doc/geschaeftsdokumentation";
$myDoc = new doc($base);
$dir_arr = $myDoc->getFiles();
natsort($dir_arr);
if (!empty($dir_arr)){
  echo "<table class=ref border=0>";
  
  foreach ($dir_arr as $key => $file) {
    $info_arr = array();
    echo "<tr>";
    echo "<td width=300>";
    $linkname = $myDoc->formatLinkName($file,false,true,"","",false,true);
    $pic = $myDoc->getFileTypeSymbol($myDoc->getFileType($file));
    echo "$pic&nbsp;<a class=main href='".$base."/$file' onClick=\"javascript:window.open(this.href,'_new','menubar=no, width=800, height=600, resizable=yes');return false;\" target='_new'>$linkname</a></td>";
    echo "</tr>";
  }
}else{
  echo "<p>";
  echo getErrMsg(4);
  echo "</p>";
}
echo "</table>";

?>
<p><a class=main href="javascript:history.back(-1);">> zur�ck <</a></p>
<?PHP
include("footer.php");
?>
