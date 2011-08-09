<?PHP

header("Content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?>";
include("cfg/config.inc.php");
include("cfg/menu.cfg.php");
include("lib/class.doc.php");
include("lib/class.menu.php");

if (!isset($_GET['channel'])) {
  $channel = "news";
} else {
  if (preg_match("/news|anlaesse|motto/",$_GET['channel'])){
    $channel = $_GET['channel'];
  }else{

  }
}
$myDoc = new doc();
$myDoc->find_dir($g_content, "/\/$channel$/", $dir);
$myDoc->path = $dir;
$dir_arr = $myDoc->getFolders(null, false);
$dir_arr = $myDoc->sortArr($dir_arr);
$pos = menu::getPositionBySite($channel);
if (!empty($dir_arr)) {
  echo "<rss version=\"2.0\">\n";
  echo "<channel>\n";
  echo "<title>ETK AG: " . ucfirst($channel) . "</title>\n";
  echo "<description>Alle " . ucfirst($channel) . " von der Firma ETK AG</description>\n";
  echo "<language>de</language>\n";
  echo "<link>http://www.etkag.ch/2011/rss.php</link>\n";
  echo "<lastBuildDate>" . date('r') . "</lastBuildDate>";
  foreach ($dir_arr as $key => $file) {
    echo "<item>\n";
    echo "<title>" . $myDoc->formatLinkName($file, true, false) . "</title>\n";
    echo "<link>\n";
    echo "http://www.etkag.ch/2011/index.php?site=" . $channel . "&amp;pos=$pos&amp;dir=$file";
    echo "</link>\n";
    //echo "<pubDate>\n";
    //echo $myDoc->getDate($file, 'r');
    //echo "</pubDate>\n";
    echo "<description>\n";
    echo "$file";
    echo "</description>\n";
    echo "</item>\n";
  }
  echo "</channel>\n";
  echo "</rss>\n";
}
?>
