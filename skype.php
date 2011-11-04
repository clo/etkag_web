<?PHP
$myDoc = new doc();
$myDoc->getContentFromInfoFile($_GET['site']);
unset($myDoc);
?>
