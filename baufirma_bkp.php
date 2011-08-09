<?PHP
include("./header.php");
?>
<h3>Baufirmen</h3>
<table class=normal border=0>
<tr>
  <td>
    <img class='etkag' src="fotos/baufirma1.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img class='etkag' src="fotos/baufirma2.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img class='etkag' src="fotos/baufirma3.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
<tr><td colspan=2>
Nur mit dem Know-How das auf dem neuesten, technischen Stand ist, kann die
Baubranche wettbewerbsf&auml;hig bleiben. Dazu geh&ouml;rt sicherlich auch eine innovative
Energieversorgung.
Gerade in der Automation sind in den letzten Jahren die Steuerungsl&ouml;sungen rasant
weiterentwickelt worden und geben dem Anwender enorme Vorteile.
Nachdem das Pflichtenheft f&uuml;r Ihre Anlage besprochen wurde, ist es unsere
Aufgabe, Ihnen eine zeitgem&auml;sse und wirtschaftliche L&ouml;sung auszuarbeiten und zu
realisieren.
Unser  Servicedienst unterst&uuml;tzt die Baufirmen bei St&ouml;rungen an Ihren
Elektroanlagen. Durch unsere langj&auml;hrige Erfahrung kennen wir auch Steuerungen
der &auml;lteren Generation und k&ouml;nnen Ihnen bei Problemen kompetent weiterhelfen.<br><br>
Anwendungsbeispiele f&uuml;r Baufirmen: 
<li>Elektrosteuerung zu Kieswerk
<li>Elektrosteuerung zu Dosieranlage
<li>Elektrosteuerung zu Betonmischanlage
<li>Elektrosteuerung zu Kransteuerungen
<li>Elektrosteuerung  zu Pumpensteuerungen
<li>Frequenzumformer oder Sanftstarter f&uuml;r einen idealen Motorenbetrieb
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
<img class='etkag' src="fotos/baufirma4.jpg" border=0>
</td>
</td></tr>
<tr>
  <td>
    <img class='etkag' src="fotos/baufirma5.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img class='etkag' src="fotos/baufirma6.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img class='etkag' src="fotos/baufirma7.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
</table>
<?PHP
include("footer.php");
?>