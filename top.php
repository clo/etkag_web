<?PHP
if (!isset($_SESSION['site']['banner'])){
  $myDoc = new doc();
  $myDoc->find_dir($g_content,"/banner/",$dir);
}else{
  $dir = $_SESSION['site']['banner'];
}
echo "<div class='top'>";

echo "<div class='topleft'>";
echo "<a href='index.php'><img class='top' width='200' src='".$dir."/logo2.jpg' alt='logo' /></a>";
echo "</div>";

$banner="$dir/banner.jpg";
echo "<div class='topright'>";
echo "<a href='$banner' $g_lytebox><img class='top' width='876' src='".$banner."' alt='banner' /></a>";
echo "</div>";

echo "</div>";
unset($myDoc);
?>