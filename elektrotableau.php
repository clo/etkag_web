<?
include("header.php");
?>
<h3>Wir fabrizieren Elektrotableau für</h3>
<table class=normal border=0>
<tr>
  <td>
    <a class=main href='index.php?site=energieverteilung&pos=<? echo $_GET[pos] ?>' target='_top'><img src="fotos/elektrotableau1.jpg" border=0></a>
    <div class=pictext_left>Energieverteilungen</div>
  </td>
  <td>
    <a class=main href='index.php?site=hausverteilung&pos=<? echo $_GET[pos] ?>' target='_top'><img src="fotos/elektrotableau2.jpg" border=0></a>
   <div class=pictext_left>Hausverteilungen</div>
  </td>
  <td>
    <a class=main href='index.php?site=gebaeudeautomation&pos=<? echo $_GET[pos] ?>' target='_top'><img src="fotos/elektrotableau3.jpg" border=0></a>
    <div class=pictext_left>Automation</div> 
  </td>
</tr>
</table>
<table class=normal border=0>
<tr>
  <td>
    <a class=main href='index.php?site=industrie&pos=<? echo $_GET[pos] ?>' target='_top'><img src="fotos/elektrotableau4.jpg" border=0></a>
    <div class=pictext_left>Industrie</div>
  </td>
  <td>
    <a class=main href='index.php?site=haustechnik&pos=<? echo $_GET[pos] ?>' target='_top'><img src="fotos/elektrotableau5.jpg" border=0></a>
   <div class=pictext_left>Haustechnik</div>
  </td>
  <td>
    <a class=main href='index.php?site=sanitaeranlage&pos=<? echo $_GET[pos] ?>' target='_top'><img src="fotos/elektrotableau6.jpg" border=0></a>
    <div class=pictext_left>Sanitäranlagen</div> 
  </td>
</tr>
</table>
<table class=normal border=0>
<tr>
  <td>
    <a class=main href='index.php?site=strassentunnel&pos=<? echo $_GET[pos] ?>' target='_top'><img src="fotos/elektrotableau7.jpg" border=0></a>
    <div class=pictext_left>Strassentunnel</div>
  </td>
  <td>
    <a class=main href='index.php?site=baufirma&pos=<? echo $_GET[pos] ?>' target='_top'><img src="fotos/elektrotableau8.jpg" border=0></a>
   <div class=pictext_left>Baufirmen</div>
  </td>
  <td>
    <a class=main href='index.php?site=spezialanlage&pos=<? echo $_GET[pos] ?>' target='_top'><img src="fotos/elektrotableau9.jpg" border=0></a>
    <div class=pictext_left>Spezialanlagen</div> 
  </td>
</tr>
</table>
<?
include("footer.php");
?>
