<?
include("header.php");
?>
<h3>Haustechnik</h3>
<table class=normal border=0>
<tr>
  <td>
    <img src="fotos/haustechnik1.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img src="fotos/haustechnik2.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img src="fotos/haustechnik3.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
<tr><td colspan=2>
Für Haustechnikfirmen  fabrizieren wir Elektrosteuerungen für Heizungs-, 
Lüftungs- und  Kälteanlagen. Den Siemens Building Standart für Heizungen 
und Lüftungen kennen wir bestens.<br>
Wir können auch Lösungen mit einer SPS Steuerung projektieren und ausführen, 
inklusive Erstellen von Elektroschema und SPS Software. Bei grösseren Objekten 
macht es Sinn die verschiedenen Steuerungen inklusive der Gebäudeautomation mit 
einer SPS-Steuerung auszuführen.<br>
Damit sich die Haustechniker nicht um den Elektroteil kümmern müssen, sind wir 
sicher der richtige Partner.
<br><br>
<?
$myDoc = new doc();
if ($myDoc->docAvailable("./doc/referenzen/Haustechnik") ) {
  echo "<a class=main href='index.php?site=referenzen&dir=Haustechnik&pos=".$_GET['pos']."' target='_top'>> Referenzen <</a>";
}
?>
<td>
<img src="fotos/haustechnik4.jpg" border=0>
</td>
</td></tr>
<tr>
  <td>
    <img src="fotos/haustechnik5.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img src="fotos/haustechnik6.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img src="fotos/haustechnik7.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
</table>
<?
include("footer.php");
?>
