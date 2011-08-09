<?PHP
$myDoc = new doc();
$myDoc->find_dir($g_content,"/\/banner$/",$dir);
echo "<div class='top'>";
echo "<a class='main' href='index.php'><img class='top' src='$dir/logo.jpg' alt='logo' /></a>&nbsp;";
echo "<img class='top' width='871' src='$dir/banner.jpg' alt='banner' />";
echo "</div>";
unset($myDoc);
?>
