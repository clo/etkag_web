<?PHP
echo "<h3 class='contenttitle'>" . ucfirst($_GET['site']) . "</h3>";
/*
 * create the file if not existing and logged in
 */
$myDoc = new doc();
if ($_SESSION['loggedin'] && !is_file($_GET['file']) && isset($_GET['file'])) {
  $myDoc->createFile();
}
/*
 * read the file content
 */
$pos = menu::getPositionBySite($_GET['dir']);
$file = $_GET['file'];
$fh = fopen($file, "r");
$content = fread($fh, filesize($file));
fclose($fh);

/*
 * Form to change the content
 */
echo "<form name='edit' action='index.php?site=" . $_GET['dir'] . "&pos=$pos' method='post'>";
echo "<input type='hidden' name='file' value='$file'>\n";
echo "<input type='hidden' name='dir' value='".dirname($_GET['file'])."'>\n";
echo "<textarea class='edit' name='content'>$content</textarea>\n";
echo "<input type='submit' name='speichern' value='speichern'>";
$pos = menu::getPositionBySite($_GET['dir']);
echo "<input type='reset' name='abbrechen' value='abbrechen' onclick=\"javascript:window.open('index.php?site=".$_GET['dir']."&pos=$pos','_parent');\">";
echo "</form>";
echo "Hilfe:<br />\n";
echo "<pre>\n";
echo $myDoc->getFileContent($g_wiki_help);
echo "</pre>\n";
echo "Anpassungen:<br />\n";
$myDoc->listInfoFiles(dirname($file));
unset($myDoc);
?>
