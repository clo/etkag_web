<?PHP
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
F�r Haustechnikfirmen  fabrizieren wir Elektrosteuerungen f�r Heizungs-, 
L�ftungs- und  K�lteanlagen. Den Siemens Building Standart f�r Heizungen 
und L�ftungen kennen wir bestens.<br>
Wir k�nnen auch L�sungen mit einer SPS Steuerung projektieren und ausf�hren, 
inklusive Erstellen von Elektroschema und SPS Software. Bei gr�sseren Objekten 
macht es Sinn die verschiedenen Steuerungen inklusive der Geb�udeautomation mit 
einer SPS-Steuerung auszuf�hren.<br>
Damit sich die Haustechniker nicht um den Elektroteil k�mmern m�ssen, sind wir 
sicher der richtige Partner.
<br><br>
<?PHP
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
<?PHP
include("footer.php");
?>
