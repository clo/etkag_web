<?PHP

include("header.php");
$myDoc = new doc();
$myDoc->getContentFromInfoFile($_GET['site']);
unset($myDoc);
if (!$_SESSION['loggedin']) {
  $s->loginform("index.php?site=login");
} else {
  $s->logout("index.php?site=login");
  echo "<span class='content'>";
  echo "<h3 class='contenttitle'>Konfigurationsdateien:</h3>";
  foreach ($g_config_files as $file) {
    echo "<a class='main' href='index.php?site=edit_new&amp;file=$file&dir=cfg&amp;sitefrom=login'>$file</a><br />";
  }
  echo "</span>";
}

include("footer.php");
?>
