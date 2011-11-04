<?PHP

$myDoc = new doc();
$myDoc->getContentFromInfoFile($_GET['site']);
//$myDoc->find_dir($g_content, $pattern, $dir);

$myDoc->path = $_SESSION['site'][$_GET['site']];;
include("list_document.php");
include("list_referenzen.php");
unset($myDoc);
?>
