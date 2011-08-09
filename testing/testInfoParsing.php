<?php

include("../lib/class.doc.php");
include("../lib/class.menu.php");
include("../lib/class.InfoParsing.php");
$newline = "\r\n";
$text = "test$newline" .
        "| col10 | col20 | col30 |" .
        "$newline".
        "| col11 | col21 | col31 |$newline" .
        "$newline".
        "| col12 | col22 | col32 |$newline" .
        "fertig$newline";

$aText = explode("$newline", $text);
$doc = new doc();
$info = new InfoParsing($doc);
foreach ($aText as $line) {
  echo $info->parse($line);
}


?>
