<?PHP
//include("header.php");

//$myDoc = new doc();
//$pattern = "/\/" . $_GET['site'] . "$/";
//$myDoc->find_dir($g_content, $pattern, $dir);
//unset($myDoc);
$dir = $_SESSION['site'][$_GET['site']];
$myDoc = new doc($dir);
$myDoc->saveContent();
?>
<h3 class="contenttitle"><?PHP echo ucfirst($_GET['site']); ?></h3>
<?PHP
if (isset($_GET['dir'])) {
  echo "<h3 class='contenttitle'>";
  echo $myDoc->getDate($_GET['dir']) . ": ";
  echo $myDoc->formatLinkName($_GET['dir'], true, true);
  echo "</h3>";
}

if (!isset($_GET['dir'])) {
  include("list_directory.php");
} else {
  echo "<table class='content' border=0>";
  //$myDoc->path = $dir . "/" . $_GET[dir];
  if ($_GET['dir']) {
    $myDoc->printEditButtonNew($_GET['dir'], $g_info_file, $_GET['site']);
  }
  include("list_infotext.php");
  echo "<tr><td><a class=main href='javascript:history.back(-1);'>".$g_backbutton."</a></td></tr>";
  echo "</table>";
}
?>

<?PHP
unset($myDoc);
include("footer.php");
?>
