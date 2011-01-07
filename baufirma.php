<?PHP
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
Baubranche wettbewerbsf�hig bleiben. Dazu geh�rt sicherlich auch eine innovative
Energieversorgung.
Gerade in der Automation sind in den letzten Jahren die Steuerungsl�sungen rasant
weiterentwickelt worden und geben dem Anwender enorme Vorteile.
Nachdem das Pflichtenheft f�r Ihre Anlage besprochen wurde, ist es unsere
Aufgabe, Ihnen eine zeitgem�sse und wirtschaftliche L�sung auszuarbeiten und zu
realisieren.
Unser  Servicedienst unterst�tzt die Baufirmen bei St�rungen an Ihren
Elektroanlagen. Durch unsere langj�hrige Erfahrung kennen wir auch Steuerungen
der �lteren Generation und k�nnen Ihnen bei Problemen kompetent weiterhelfen.<br><br>
Anwendungsbeispiele f�r Baufirmen: 
<li>Elektrosteuerung zu Kieswerk
<li>Elektrosteuerung zu Dosieranlage
<li>Elektrosteuerung zu Betonmischanlage
<li>Elektrosteuerung zu Kransteuerungen
<li>Elektrosteuerung  zu Pumpensteuerungen
<li>Frequenzumformer oder Sanftstarter f�r einen idealen Motorenbetrieb
<li>Elektroteil von Baumaschinen
<li>Baustellenstromverteiler 15A-250A
<li>Service und Unterhalt zu Elektrosteuerungen
<br><br>
<?PHP
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
<?PHP
include("footer.php");
?>