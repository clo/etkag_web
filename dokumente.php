<?PHP
include("header_nocache.php");
if ($_GET['w']=='dok'){
  $title = "Dokumente";
}elseif($_GET['w']=='fot'){
  $title = "Fotos";
}
$myDoc = new doc($_GET['dir']);
?>
<h3 class="contenttitle_100" ><?PHP echo $title.": ".$myDoc->formatLinkName($_GET['kom']);?></h3>
<?PHP
$base=$_GET['dir'];
if (isset($_GET['w'])){
  if (isset($_GET['w'])){
    if ($_GET['w']== "fot"){
      $dir_arr = $myDoc->getFiles($_GET[dir],"*.jpg|.*JPG");
      $myDoc->listPicture();
    }else if ($_GET['w'] == "dok"){
      $dir_arr = $myDoc->getFiles($_GET[dir],".*pdf|.*PDF");
      echo "<span class='content>";
      $myDoc->listDocument();
      echo "</span>";
    }
  }
}
echo "</table>";

echo "<p>&nbsp;<a class=main href='javascript:history.back(-1);'>$g_backbutton</a></p>";
unset($myDoc);
include("footer.php");
?>
