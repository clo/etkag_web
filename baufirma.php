<?
include("./header.php");
?>
<h3>Baufirmen</h3>
<table class=normal border=0>
<tr>
  <td>
    <img src="fotos/baufirma1.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img src="fotos/baufirma2.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img src="fotos/baufirma3.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
<tr><td colspan=2>
Nur mit dem Know-How das auf dem neuesten, technischen Stand ist, kann die
Baubranche wettbewerbsfähig bleiben. Dazu gehört sicherlich auch eine innovative
Energieversorgung.
Gerade in der Automation sind in den letzten Jahren die Steuerungslösungen rasant
weiterentwickelt worden und geben dem Anwender enorme Vorteile.
Nachdem das Pflichtenheft für Ihre Anlage besprochen wurde, ist es unsere
Aufgabe, Ihnen eine zeitgemässe und wirtschaftliche Lösung auszuarbeiten und zu
realisieren.
Unser  Servicedienst unterstützt die Baufirmen bei Störungen an Ihren
Elektroanlagen. Durch unsere langjährige Erfahrung kennen wir auch Steuerungen
der älteren Generation und können Ihnen bei Problemen kompetent weiterhelfen.<br><br>
Anwendungsbeispiele für Baufirmen: 
<li>Elektrosteuerung zu Kieswerk
<li>Elektrosteuerung zu Dosieranlage
<li>Elektrosteuerung zu Betonmischanlage
<li>Elektrosteuerung zu Kransteuerungen
<li>Elektrosteuerung  zu Pumpensteuerungen
<li>Frequenzumformer oder Sanftstarter für einen idealen Motorenbetrieb
<li>Elektroteil von Baumaschinen
<li>Baustellenstromverteiler 15A-250A
<li>Service und Unterhalt zu Elektrosteuerungen
<br><br>
<?
$myDoc = new doc();
if ($myDoc->docAvailable("./doc/referenzen/Baufirma")) {
  echo "<a class=main href='index.php?site=referenzen&dir=Baufirma&pos=".$_GET['pos']."' target='_top'>> Referenzen <</a>";
}
?>
<td>
<img src="fotos/baufirma4.jpg" border=0>
</td>
</td></tr>
<tr>
  <td>
    <img src="fotos/baufirma5.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img src="fotos/baufirma6.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img src="fotos/baufirma7.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
</table>
<?
include("footer.php");
?>