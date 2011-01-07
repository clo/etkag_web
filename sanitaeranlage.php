<?
include("header.php");
?>
<h3>Sanitäranlagen</h3>
<table class=normal border=0>
<tr>
  <td>
    <img src="fotos/sanitaer1.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img src="fotos/sanitaer2.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img src="fotos/sanitaer3.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
<tr><td colspan=2>
Durch unsere guten Kenntnisse von Wasseraufbereitungssystemen sind wir 
sicher der ideale Partner für den Elektroteil von Schwimmbad-, Whirlpool- 
und Pumpensteuerungen. Ob Relais- oder SPS-Steuerung, wir haben gute Erfahrungen 
um Sie preiswert zu unterstützen. Erstellen von Pflichtenheft und  Elektroschema, 
Ausführung Elektrotableau und SPS-Software, Inbetriebnahme und Servicedienst, 
wir können Ihnen die passende Elektrosteuerung ausführen.<br>
Die Bedienung der Anlage kann übersichtlich auf einem Touch-Panel geschehen. 
Einfache Änderungen des Betriebsablaufes geschehen direkt auf dem Touch-Panel. 
Bei einem Telefon-Modem haben wir Zugriff auf die SPS-Steuerung und können bei 
Anpassungen des Betriebsablaufes auch von extern helfen.<br>
Gerade bei Schwimmbadsteuerungen für Hotels macht es Sinn, die Steuerung mit 
der sonstigen Gebäudeautomation zu integrieren, damit der Hotelier nur ein 
System bedienen und überwachen muss.

<br><br>
<?
$myDoc = new doc();
if ($myDoc->docAvailable("./doc/referenzen/Sanitaeranlage")) {
  echo "<a class=main href='index.php?site=referenzen&dir=Sanitaeranlage&pos=".$_GET['pos']."' target='_top'>> Referenzen <</a>";
}
?>
<td>
<img src="fotos/sanitaer4.jpg" border=0>
</td>
</td></tr>
<tr>
  <td>
    <img src="fotos/sanitaer5.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img src="fotos/sanitaer6.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img src="fotos/sanitaer7.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
</table>
<?
include("footer.php");
?>
