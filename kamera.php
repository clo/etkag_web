<?php
//echo "<iframe width='800' height='500' src='http://frank.mine.nu:85'></iframe>";
if (!isset($myDoc)){
  $myDoc = new doc();
}
$myDoc->getContentFromInfoFile($_GET['site']);
$dir = $_SESSION['site'][$_GET['site']];
$myDoc->path = $dir;
unset($myDoc);
?>
