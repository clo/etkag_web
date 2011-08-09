<?PHP

//include("header.php");
$myDoc = new doc();
$myDoc->getContentFromInfoFile($_GET['site']);
unset($myDoc);
include("footer.php");
?>
