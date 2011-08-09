<?PHP
include("header_nocache.php");
if ($_GET['w']=='dok'){
  $title = "Dokumente";
}elseif($_GET['w']=='fot'){
  $title = "Fotos";
}
$myDoc = new doc($_GET['dir']);
?>
<h3 class="contenttitle"><?PHP echo $title.": ".$myDoc->formatLinkName($_GET['kom']);?></h3>
<?PHP
$base=$_GET['dir'];
$dir_arr = $myDoc->getFiles($_GET[dir],"^etkag_|pdf$");
if (!empty($dir_arr)){
  $myDoc->listPicture();
//  echo "<table class=content border=0>";
//
//  if ($_GET['w'] == 'dok'){
//    $len = strlen('dokumente');
//  }else{
//    $len = strlen('foto');
//  }
//  $info_arr = $myDoc->getInfoText(substr($_GET['dir'],0,strlen($_GET['dir'])-$len));
//  //echo substr($_GET['dir'],0,strlen($_GET['dir'])-strlen("dokument"));
//  if (!empty($info_arr['bemerkung'])){
//    echo "<tr><td>".$info_arr['bemerkung']."</td></tr>";
//    echo "<tr><td>&nbsp;</td></tr>";
//  }
//  foreach ($dir_arr as $key => $file) {
//    echo "<tr>";
//    echo "<td width=300>";
//    $linkname = $myDoc->formatLinkName($file,false,false,"etkag_","../".$base,false,true);
//    $pic = $myDoc->getFileTypeSymbol($myDoc->getFileType($file));
//    if (!preg_match("/pdf/",$myDoc->getFileType($file))) { $lytebox = "rel='lytebox'"; } else { $lytebox = ""; }
//    echo "$pic&nbsp;<a $lytebox class=main href='".$_GET[dir]."/$file' onClick=\"javascript:window.open(this.href,'_new','menubar=no, width=800, height=600, resizable=yes');return false;\" target='_new'>$linkname</a>";
//    echo "</td>";
//    echo "</tr>";
//  }
}else{
  echo "<p>";
  echo getErrMsg(2);
  echo "</p>";
}
echo "</table>";

?>
<p><a class=main href="javascript:history.back(-1);">> zur&uuml;ck <</a></p>
<?PHP
unset($myDoc);
include("footer.php");
?>
