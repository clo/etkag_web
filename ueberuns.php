<?PHP
if (!isset($myDoc)){
  $myDoc = new doc();
}
$myDoc->getContentFromInfoFile($_GET['site']);
unset($myDoc);
?>