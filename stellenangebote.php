<?PHP

include("header.php");
$myDoc = new doc();
$myDoc->getContentFromInfoFile($_GET['site']);
$myDoc->find_dir($g_content, "\/$pattern$/", $dir);
$myDoc->path = $dir;
unset($myDoc);
include("footer.php");
?>
