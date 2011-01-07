<?PHP
include("header.php");
?>
<h3>Sanit�ranlagen</h3>
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
sicher der ideale Partner f�r den Elektroteil von Schwimmbad-, Whirlpool- 
und Pumpensteuerungen. Ob Relais- oder SPS-Steuerung, wir haben gute Erfahrungen 
um Sie preiswert zu unterst�tzen. Erstellen von Pflichtenheft und  Elektroschema, 
Ausf�hrung Elektrotableau und SPS-Software, Inbetriebnahme und Servicedienst, 
wir k�nnen Ihnen die passende Elektrosteuerung ausf�hren.<br>
Die Bedienung der Anlage kann �bersichtlich auf einem Touch-Panel geschehen. 
Einfache �nderungen des Betriebsablaufes geschehen direkt auf dem Touch-Panel. 
Bei einem Telefon-Modem haben wir Zugriff auf die SPS-Steuerung und k�nnen bei 
Anpassungen des Betriebsablaufes auch von extern helfen.<br>
Gerade bei Schwimmbadsteuerungen f�r Hotels macht es Sinn, die Steuerung mit 
der sonstigen Geb�udeautomation zu integrieren, damit der Hotelier nur ein 
System bedienen und �berwachen muss.

<br><br>
<?PHP
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
<?PHP
include("footer.php");
?>
