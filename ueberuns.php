<?PHP
$myDoc = new doc();
$myDoc->getContentFromInfoFile($_GET['site']);
//TODO: insert motto
unset($myDoc);
?>