<?PHP
include("header.php");
$myDoc = new doc();
$myDoc->getContentFromInfoFile($_GET['site']);
unset($site);
include("footer.php");
?>
