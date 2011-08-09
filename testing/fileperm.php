<?php

echo "<pre>";
echo "Userid: ";
echo get_current_user();
echo "\n";
$basepath = "../";
$dir = "doc1/hauptseite/testing";

$dh = opendir('./');
while (($file = readdir($dh)) !== false) {
  if (!preg_match("/^\..*/", $file)) {
    printf("%-20s%-20s%-20s%-20s\n", $file, "permission=" . fileperms($file), "owner=" . fileowner($file), "group=".filegroup($file));
  }
}
closedir($dh);
?>

