<?PHP
include("header.php");
?>
<h3>Haustechnik</h3>
<table class=normal border=0>
<tr>
  <td>
    <img class='etkag' src="fotos/haustechnik1.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img class='etkag' src="fotos/haustechnik2.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img class='etkag' src="fotos/haustechnik3.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
<tr><td colspan=2>
F&uuml;r Haustechnikfirmen  fabrizieren wir Elektrosteuerungen f&uuml;r Heizungs-, 
L&uuml;ftungs- und  K&auml;lteanlagen. Den Siemens Building Standart f&uuml;r Heizungen 
und L&uuml;ftungen kennen wir bestens.<br>
Wir k&ouml;nnen auch L&ouml;sungen mit einer SPS Steuerung projektieren und ausf&uuml;hren, 
inklusive Erstellen von Elektroschema und SPS Software. Bei gr&ouml;sseren Objekten 
macht es Sinn die verschiedenen Steuerungen inklusive der Geb&auml;udeautomation mit 
einer SPS-Steuerung auszuf&uuml;hren.<br>
Damit sich die Haustechniker nicht um den Elektroteil k&uuml;mmern m&uuml;ssen, sind wir 
sicher der richtige Partner.
<br><br>
<?PHP
$myDoc = new doc();
if ($myDoc->docAvailable("./doc/referenzen/Haustechnik") ) {
  echo "<a class=main href='index.php?site=referenzen&dir=Haustechnik&pos=".$_GET['pos']."' target='_top'>> Referenzen <</a>";
}
?>
<td>
<img class='etkag' src="fotos/haustechnik4.jpg" border=0>
</td>
</td></tr>
<tr>
  <td>
    <img class='etkag' src="fotos/haustechnik5.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img class='etkag' src="fotos/haustechnik6.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img class='etkag' src="fotos/haustechnik7.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
</table>
<?PHP
include("footer.php");
?>
