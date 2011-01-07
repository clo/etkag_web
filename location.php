<?PHP
if (isset($_GET[site])){
	$rub = strtolower($_REQUEST['site']);
	$rub = ucfirst($rub);
	$rub = replaceUmlaut($rub);
	$rub = ucwords(str_replace("_"," ",$rub));
	echo "<p class=location>Menu: ".$rub;
}
if (isset($_REQUEST[pid])) {
	echo " > ".ucfirst($_REQUEST['pid'])."</p>";
}
?>