<?PHP

$myDoc = new doc();
$myDoc->getContentFromInfoFile($_GET['site']);
//$myDoc->find_dir($g_content, $pattern, $dir);
$dir = $_SESSION['site'][$_GET['site']];
$myDoc->path = $dir;
//include("list_document.php");
//include("list_referenzen.php");
unset($myDoc);
?>
