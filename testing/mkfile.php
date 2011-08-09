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
    echo $file . ": " . fileperms($file) . ":" . fileowner($file) . "\n";
  }
}
closedir($dh);
exit(1);
echo "Make dir: " . $dir;
if (!is_dir($dir)) {
  mkdir($dir, 4770, true) or die("Could not create dir: " . $dir);
  echo "$dir successfully created\n";
  echo fileperms($dir);
}
$file = $dir . "/info.txt";
echo decoct(fileperms(dirname($file)));
$fh = fopen($file, "a+");
fclose($fh);
echo "</pre>";
?>

