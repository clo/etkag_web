<?PHP
//$myDoc = new doc();
//$myDoc->listReferenceObjectDetail($_GET['dir']);
//unset($myDoc);
if (!isset($myDoc)){
  $myDoc = new doc();
}
$myDoc->listReferenceObjectDetail($_GET['dir']);
$myDoc->path = $dir;
unset($myDoc);
?>
