<?PHP

/*
 * This file list the content of a info.txt file
 */

$file = $myDoc->path . "/" . $g_info_file;
//$myDoc->find_dir($g_content,"/\/".$_GET['dir']."$/",$dir);
$dir = $_SESSION['site'][$_GET['dir']];

$myDoc->path=$dir;
$file = $dir."/".$g_info_file;
//echo $file."<br />";
if (is_file($file)) {
  echo "<tr><td class='contentleft'>";
  $fh = fopen($file, "r");
  $content = fread($fh, filesize($file));
  $aContent = explode("\r\n", $content);
  $firstline = true;
  $parse = new InfoParsing($myDoc);
  $parse->setTitle(false);
  foreach ($aContent as $line) {
    echo $parse->parse($line);
  }
  echo "</td></tr>";
  unset($parse);
}
echo "<br />\n";
?>