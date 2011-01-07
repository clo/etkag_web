<?PHP
include("header.php");
?>
<h3>Spezialangebote</h3>
<table class=normal border=0>
<?PHP
$base="doc/spezialangebote";
$myDoc = new doc($base);
$dir_arr = $myDoc->getFolders();
foreach ($dir_arr as $key => $file) {
    echo "<tr>";	
    echo "<td width=300>";
    $linkname = $myDoc->formatLinkName($file,false,false,"etkag_","../".$base,false,true);
    $pic = $myDoc->getFileTypeSymbol($myDoc->getFileType($file));
    echo "$pic&nbsp;<a class=main href='".$base."/".$file."' onClick=\"javascript:window.open(this.href,'_new','menubar=no, width=800, height=600, resizable=yes');return false;\" target='_new'>$linkname</a>";
    echo "</td>";
    echo "</tr>";
}
echo "</table>";
?>
<?PHP
include("footer.php");
?>
