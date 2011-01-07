<html>
<head>
<title><?PHP echo $pagetitle?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="./css/etkag.css" media=screen rel=stylesheet type=text/css>
</head>
<body>
<table class="normal" hieght="100" width="100%" border="0">
<tr><td>
<?PHP
switch ($_GET["pid"]) {
	case 'geschichte'	: include("$_GET[pid].php");break;
	case 'philosophie'	: include("$_GET[pid].php");break;
	case 'organistation': include("$_GET[pid].php");break;
	case 'iso'			: include("$_GET[pid].php");break;
	case 'infrastruktur': include("$_GET[pid].php");break;
	case 'undercon'		: include("$_GET[pid].php");break;			
	default: include("home.php");
}
?>
</td></tr>
</table>
</body>
</html>