<?PHP
$pattern = "/".$_GET[site]."$/";
$myDoc = new doc();
//$myDoc->getContentFromInfoFile($pattern);
//$myDoc->find_dir($g_content, $pattern, $base);
$base = $_SESSION['site'][$_GET['site']];
unset($myDoc);

$myDoc = new doc($base);
echo "<h3 class='contenttitle'>".ucfirst($_GET[site])."</h3>";

$file_arr = $myDoc->getFiles($base,".php$|.pdf$|.jpf$|.JPG$");

if (count($file_arr)>0){
  include("list_document.php");
  include("list_album.php");
}
unset($myDoc);
?>
