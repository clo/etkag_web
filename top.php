<p cellpadding=0 cellspacing=0 width='900' align="left" valign="middle" style="background: #DDDDDD;">
<img src="img/logo_etk_200px.jpg" border="0" target="_parent" onClick="javascript:window.location.href='http://www.etkag.ch';">
<img src="img/spacer.gif" height="1" width="223">
<img src='img/iso9001_50px.jpg' border=0 title='ISO Zertifizierung 9001'>
<img src='img/iqnet_50px.jpg' border=0 title='IQNet'>
<img src="img/spacer.gif" height="1" width="223">
<?PHP
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
</p>
