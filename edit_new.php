<?PHP

/*
 * following paramter must be set :
 *
 * $dir
 * $file
 * $sitefrom
 * $_SESSION[loggedin]
 *
 */
echo "<h3 class='contenttitle'>" . ucfirst($_GET['site']) . "</h3>";

/*
 * create the file if not existing and logged in
 * 12345678
 */
$myDoc = new doc();
if (preg_match("/^[0-9]{8}.*/",$_GET['dir'])) {
  //$myDoc->find_dir($g_content, "/\/" . $_GET['dir'] . "$/", $basedir);
  $basedir = $_SESSION['site'][$_GET['site']];
  $file = $basedir . "/" . $_GET['file'];
} else {
  $basedir = $_GET['dir'];
  $file = $_GET['dir'] . "/" . $_GET['file'];
}
//echo $basedir."";
echo "Datei:&nbsp;$file<br />\n";
if ($_SESSION['loggedin'] && !file_exists($file)) {
  $myDoc->createFileFromWeb("/htdocs/2011",$basedir,$file);
}

/*
 * read the file content
 */
$pos = menu::getPositionBySite($_GET['sitefrom']);
$fh = fopen($file, "r");
$content = fread($fh, filesize($file));
fclose($fh);

/*
 * Form to change the content
 */
echo "<form name='edit' action='index.php?site=" . $_GET['sitefrom'] . "&pos=$pos&dir=" . $_GET['dir'] . "' method='post' enctype='multipart/form-data' accept-charset='UTF-8'>";
echo "<input type='hidden' name='file' value='$file'>\n";
echo "<textarea class='edit' name='content'>$content</textarea>\n";
echo "<input type='submit' name='speichern' value='speichern'>";
$pos = menu::getPositionBySite($_GET['dir']);
echo "<input type='reset' name='abbrechen' value='abbrechen' " .
 "onclick=\"javascript:window.open('index.php?site=" . $_GET['sitefrom'] . "&pos=$pos&dir=" . $_GET['dir'] . "','_parent');\">";
echo "</form>";

/*
 * little wiki help
 */
echo "Hilfe:<br />\n";
echo "<pre>\n";
echo $myDoc->getFileContent($g_wiki_help);
echo "</pre>\n";

/*
 * List of changes
 */
echo "Anpassungen:<br />\n";
$myDoc->listInfoFiles(dirname($file));
unset($myDoc);
?>
