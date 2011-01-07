<?
include("header.php");
?>
<h3>Logos</h3>
<p>
<?
$path = "./doc/logos";
$myDoc = new doc($path);
if($myDoc->docAvailable()){
  $file_arr = $myDoc->getFiles();
  if (!empty($file_arr)){
    foreach ($file_arr as $key => $file){
      $pic = $myDoc->getFileTypeSymbol($myDoc->getFileType($file));
      echo "$pic&nbsp;<a class=main href='".$myDoc->path."/".$file."' onClick=\"javascript:window.open(this.href,'_new','menubar=no, width=800, height=600, resizable=yes');return false;\" target='_new'>";
      echo $myDoc->formatLinkName($file,false,false,"","",false,true);
      echo "</a>";
      echo "<br>";
    }
  }
}
?>
</p>
<?
include("footer.php");
?>