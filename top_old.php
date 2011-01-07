<!--<html>
<head>
<title><?PHPecho $pagetitle?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK href="./css/etkag.css" media=screen rel=stylesheet type=text/css>
</head>-->
<body bgcolor="#DDDDDD">
<table bordercolor="#002740" class="top" height="100%" width="900" border="0">
<tr>
<td width="200" rowspan=2><a href="./index.php" border="0"><img src="img/logo_etk_200px.jpg" border="0" target="_parent"></a></td>
<!--<td align="left" valign="bottom" width="400">-->
<td align='right' width="250">
<img src='img/iso9001_50px.jpg' border=0 title='ISO Zertifizierung 9001'>
</td>
<td align='left' width="250">
<img src='img/iqnet_50px.jpg' border=0 title='IQNet'>
</td>
<td align="right" width="300" rowspan="2" bgcolor="#FF0000">
<?PHP
//include('./cfg/config.inc.php');
if (!empty($picture_top[$_GET['site']]) && is_file($picture_top[$_GET['site']])){
  $imgpath = $picture_top[$_GET['site']];
}else{
  $imgpath = $picture_top['default'];
}
if (!empty($_GET['toppic']) && is_file($_GET['toppic'])){
  $imgpath = $_GET['toppic'];
}
echo "<img src='".$imgpath."' height='100' border='0'>";
?>

<tr wdith="500">
<td colspan=2>
<?PHP
include_once("location.php");

?>
</td>
</tr>
</td>
</tr>
</table>
<!--</body>
</html>-->